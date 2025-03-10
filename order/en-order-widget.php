<?php
/**
 * Order widget page.
 */
if (!class_exists('EnOrderWidget')) {

    class EnOrderWidget
    {
        public $en_widget_details = [];
        public $en_flat_rate_details = [];
        public $en_account_details = [];
        public $en_flat_rate_total = '';
        public $en_flat_rate_label = [];

        public function __construct()
        {
            add_action('woocommerce_order_actions', [$this, 'en_order_actions'], 10, 2);
        }

        /**
         * Assign order details.
         */
        function en_order_actions($actions, $order)
        {
            $shipping_details = $order->get_items('shipping');
            foreach ($shipping_details as $item_id => $shipping_item_obj) {
                $get_formatted_meta_data = $shipping_item_obj->get_formatted_meta_data();
                foreach ($get_formatted_meta_data as $key => $meta_data) {
                    switch ($meta_data->key) {
                        case 'en_fdo_meta_data':
                            $en_widget_details = json_decode($meta_data->value, true);
                            if (!empty($en_widget_details)) {
                                $this->en_widget_details[] = $en_widget_details;
                            }
                            break;
                        case 'en_flat_rate_details':
                            $this->en_flat_rate_details = json_decode($meta_data->value, true);
                            break;
                        case 'en_flat_rate_total':
                            $this->en_flat_rate_total = $meta_data->value;
                            break;
                        case 'en_flat_rate_label':
                            $this->en_flat_rate_label = $meta_data->value;
                            break;
                        case 'en_account_details':
                            $this->en_account_details = json_decode($meta_data->value, true);
                            break;
                    }
                }
            }

            add_meta_box('en_additional_order_details', __('Additional Order Details', 'woocommerce'), [$this, 'en_order_widget'], get_current_screen()->id, 'side', 'low', 'core');

            return $actions;
        }

        /**
         * Show order details.
         */
        public function en_show_order_widget($number_shipment, $sender_origin, $label, $cost, $accessorials, $items, $en_extra_accessories)
        {
            if (!strlen($sender_origin) > 0) {
                return;
            }
            echo '<h4 style="text-decoration: underline;margin: 4px 0px 4px 0px;">Shipment ' . $number_shipment . " > Origin & Services </h4>";
            echo '<ul class="en-list" style="list-style: disc;list-style-position: inside;">';
            echo '<li>';

            echo esc_attr($sender_origin);

            echo '<br>';
            echo '</li>';

            $label = strlen($label) > 0 ? $label : 'Shipping';
            echo '<li>' . esc_attr($label) . ': ' . $this->en_format_price($cost) . '</li>';

            /* Show Accessorials */
            if ($cost > 0) {
                $this->en_show_accessorials($accessorials);
            }

            foreach ($en_extra_accessories as $index => $value) {
                echo '<li>' . esc_attr($index) . ': ' . $value . '</li>';
            }

            echo "</ul>";
            echo "<br>";
            echo '<h4 style="text-decoration: underline;margin: 4px 0px 4px 0px;">Shipment ' . $number_shipment . " > items </h4>";
            echo '<ul id="product-details-order" class="en-list" style="list-style: disc;list-style-position: inside;">';

            foreach ($items as $key => $item) {
                echo '<li>' . esc_attr($item) . '</li>';
            }

            echo '</ul>';
            echo "<br><br>";
        }

        /**
         * Order details.
         */
        public function en_order_widget()
        {
            if (!empty($this->en_account_details) && is_array($this->en_account_details)) {
                echo '<h4 style="text-decoration: underline;margin: 4px 0px 4px 0px;"> Shipment Account Number Details:</h4>';
                echo '<ul class="en-list" style="list-style: disc;list-style-position: inside;">';
                foreach ($this->en_account_details as $acc_field => $acc_field_val) {
                    echo '<li>' . $acc_field . ': ' . $acc_field_val . '</li>';
                }
                echo '</ul>';
                return;
            }

            foreach ($this->en_widget_details as $method_key => $en_widget_details) {
                $shipments = isset($en_widget_details['data']) ? $en_widget_details['data'] : [];
                $number_shipment = 1;
                foreach ($shipments as $count => $shipment) {
                    $items = $accessorials = $address = $rate = $en_extra_accessories = [];
                    extract($shipment);

                    $label = (isset($rate['label'])) ? $rate['label'] : 'Shipping';
                    $cost = (isset($rate['cost'])) ? $rate['cost'] : 0;

                    $location = $city = $state = $zip = '';
                    if (!empty($address)) {
                        extract($address);
                        $sender_origin = ucwords($location) . ": " . $city . ", " . $state . " " . $zip;
                    } else {
                        $sender_origin = $label;
                    }

                    $items_li = [];
                    foreach ($items as $key => $item) {
                        $quantity = $name = '';
                        extract($item);
                        $items_li[] = $quantity . " X " . $name;
                    }

                    $this->en_show_order_widget($number_shipment, $sender_origin, $label, $cost, $accessorials, $items_li, $en_extra_accessories);

                    $number_shipment++;
                }
            }

            if (!empty($this->en_flat_rate_details) && $this->en_flat_rate_total != '') {
                if(!isset($en_extra_accessories)) {
                    $en_extra_accessories = [];
                }
                if(!isset($number_shipment)) {
                    $number_shipment = 1;
                }
                $this->en_show_order_widget($number_shipment, 'Flat Rate Shipping', $this->en_flat_rate_label, $this->en_flat_rate_total, [], $this->en_flat_rate_details, $en_extra_accessories);
            }
        }

        /**
         * Show accessorial on order detail page.
         * @param array $accessorials
         */
        public function en_show_accessorials($accessorials)
        {
            $en_accessorials = [
                'residential' => 'Residential delivery',
                'liftgate' => 'Lift gate delivery',
                'hazmat' => 'Hazardous Material',
                'holdatterminal' => 'Hold At Terminal'
            ];

            foreach ($accessorials as $accessorial => $status) {
                if ($status && isset($en_accessorials[$accessorial])) {
                    echo '<li>' . $en_accessorials[$accessorial] . '</li>';
                }
            }
        }

        /**
         * Price format.
         * @param int/double/string $dollars
         * @return string
         */
        function en_format_price($dollars)
        {
            $currency_symbol = get_woocommerce_currency_symbol(get_option('woocommerce_currency'));
            return $currency_symbol . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)), 2);
        }
    }

    new EnOrderWidget();
}