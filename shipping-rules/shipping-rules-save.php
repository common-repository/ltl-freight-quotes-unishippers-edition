<?php

/**
 * Includes Shipping Rules Ajax Request class
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists("EnUnishippersLtlShippingRulesAjaxReq")) {

    class EnUnishippersLtlShippingRulesAjaxReq
    {
        /**
         * Get shipping rules ajax request
         */
        public function __construct()
        {
            add_action('wp_ajax_nopriv_en_unishippers_ltl_save_shipping_rule', array($this, 'en_unishippers_ltl_save_shipping_rule_ajax'));
            add_action('wp_ajax_en_unishippers_ltl_save_shipping_rule', array($this, 'en_unishippers_ltl_save_shipping_rule_ajax'));

            add_action('wp_ajax_nopriv_en_unishippers_ltl_edit_shipping_rule', array($this, 'en_unishippers_ltl_edit_shipping_rule_ajax'));
            add_action('wp_ajax_en_unishippers_ltl_edit_shipping_rule', array($this, 'en_unishippers_ltl_edit_shipping_rule_ajax'));

            add_action('wp_ajax_nopriv_en_unishippers_ltl_delete_shipping_rule', array($this, 'en_unishippers_ltl_delete_shipping_rule_ajax'));
            add_action('wp_ajax_en_unishippers_ltl_delete_shipping_rule', array($this, 'en_unishippers_ltl_delete_shipping_rule_ajax'));

            add_action('wp_ajax_nopriv_en_unishippers_ltl_update_shipping_rule_status', array($this, 'en_unishippers_ltl_update_shipping_rule_status_ajax'));
            add_action('wp_ajax_en_unishippers_ltl_update_shipping_rule_status', array($this, 'en_unishippers_ltl_update_shipping_rule_status_ajax'));
        }

        // MARK: Save Shipping Rule
        /**
         * Save Shipping Rule Function
         * @global $wpdb
         */
        function en_unishippers_ltl_save_shipping_rule_ajax()
        {
            global $wpdb;

            $insert_qry = $update_qry = '';
            $error = false;
            $data = $_POST;
            $get_shipping_rule_id = (isset($data['rule_id']) && intval($data['rule_id'])) ? $data['rule_id'] : "";
            $last_id = $get_shipping_rule_id;
            $qry = "SELECT * FROM " . $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules WHERE name = '" . $data['name'] . "'"; 
            $get_shipping_rule = $wpdb->get_results($qry);
            unset($data['action']);
            unset($data['rule_id']);
            
            if (!empty($get_shipping_rule_id)) {
                $data['settings'] = json_encode($data['settings']);
                $update_qry = $wpdb->update(
                    $wpdb->prefix . 'eniture_unishippers_ltl_shipping_rules', $data, array('id' => $get_shipping_rule_id)
                );

                $update_qry = (!empty($get_shipping_rule) && reset($get_shipping_rule)->id == $get_shipping_rule_id) ? 1 : $update_qry;
            } else {
                if (!empty($get_shipping_rule)) {
                    $error = true;
                } else {
                    $data['settings'] = json_encode($data['settings']);
                    $insert_qry = $wpdb->insert($wpdb->prefix . 'eniture_unishippers_ltl_shipping_rules', $data);
                    $last_id = $wpdb->insert_id;
                }
            }

            $shipping_rules_list = array('name' => $data["name"], 'type' => $data["type"], 'is_active' => $data["is_active"], 'insert_qry' => $insert_qry, 'update_qry' => $update_qry, 'id' => $last_id, 'error' => $error);

            echo json_encode($shipping_rules_list);
            exit;
        }

        // MARK: Edit Shipping Rule
        /**
         * Edit Shipping Rule Function
         * @global $wpdb
         */
        function en_unishippers_ltl_edit_shipping_rule_ajax()
        {
            global $wpdb;
            $get_shipping_rule_id = (isset($_POST['edit_id']) && intval($_POST['edit_id'])) ? $_POST['edit_id'] : "";
            $shipping_rules_list = $wpdb->get_results(
                "SELECT * FROM " . $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules WHERE id=$get_shipping_rule_id"
            );
            $product_tags_markup = $this->en_unishippers_ltl_get_product_tags_markup($shipping_rules_list);
            $data = ['rule_data' => reset($shipping_rules_list), 'product_tags_markup' => $product_tags_markup];

            echo json_encode($data);
            exit;
        }

        // MARK: Delete Shipping Rule
        /**
         * Delete Shipping Rule Function
         * @global $wpdb
         */
        function en_unishippers_ltl_delete_shipping_rule_ajax()
        {
            global $wpdb;
            $get_shipping_rule_id = (isset($_POST['delete_id']) && intval($_POST['delete_id'])) ? $_POST['delete_id'] : "";
            $qry = $wpdb->delete($wpdb->prefix . 'eniture_unishippers_ltl_shipping_rules', array('id' => $get_shipping_rule_id));

            echo json_encode(['query' => $qry]);
            exit;
        }

        // MARK: Update Shipping Rule Status
        /**
         * Update Shipping Rule Status Function
         * @global $wpdb
         */
        function en_unishippers_ltl_update_shipping_rule_status_ajax()
        {
            global $wpdb;
            $get_shipping_rule_id = (isset($_POST['rule_id']) && intval($_POST['rule_id'])) ? $_POST['rule_id'] : "";
            $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : "";
            $data = ['is_active' => $is_active];
            
            $update_qry = $wpdb->update(
                $wpdb->prefix . 'eniture_unishippers_ltl_shipping_rules', $data, array('id' => $get_shipping_rule_id)
            );

            echo json_encode(['id' => $get_shipping_rule_id, 'is_active' => $is_active, 'update_qry' => $update_qry]);
            exit;
        }

        // MARK: Get Product Tags
        /**
         * Get Product Tags Function
         * @global $wpdb
         */
        function en_unishippers_ltl_get_product_tags_markup($shipping_rules_list)
        {
            $tags_options = '';
            $shipping_rules_list = reset($shipping_rules_list);
            $tags_data = isset($shipping_rules_list->settings) ? json_decode($shipping_rules_list->settings, true) : [];
            $selected_tags_detials = $this->en_unishippers_ltl_get_selected_tags_details($tags_data['filter_by_product_tag_value']);

            if (!empty($selected_tags_detials) && is_array($selected_tags_detials)) {
                foreach ($selected_tags_detials as $key => $tag) {
                    $tags_options .= "<option selected='selected' value='" . esc_attr($tag['term_taxonomy_id']) . "'>" . esc_html($tag['name']) . "</option>";
                }
            }

            if (empty($tags_data['filter_by_product_tag_value']) || !is_array($tags_data['filter_by_product_tag_value'])) {
                $tags_data['filter_by_product_tag_value'] = [];
            }

            $en_woo_product_tags = get_tags( array( 'taxonomy' => 'product_tag' ) );
            if (!empty($en_woo_product_tags) && is_array($tags_data['filter_by_product_tag_value'])) {
                foreach ($en_woo_product_tags as $key => $tag) {
                    if (!in_array($tag->term_id, $tags_data['filter_by_product_tag_value'])) {
                        $tags_options .= "<option value='" . esc_attr($tag->term_taxonomy_id) . "'>" . esc_html($tag->name) . "</option>";
                    }
                }
            }

            return $tags_options;
        }

        // MARK: Get Selected Tags Details
        /**
         * Get Selected Tags Details Function
         * @global $wpdb
         */
        function en_unishippers_ltl_get_selected_tags_details($products_tags_arr)
        {
            if (empty($products_tags_arr) || !is_array($products_tags_arr)) {
                return [];
            }

            $tags_detail = [];
            $count = 0;
            $en_woo_product_tags = get_tags( array( 'taxonomy' => 'product_tag' ) );

            if (isset($en_woo_product_tags) && !empty($en_woo_product_tags)) {
                foreach ($en_woo_product_tags as $key => $tag) {
                    if (in_array($tag->term_taxonomy_id, $products_tags_arr)) {
                        $tags_detail[$count]['term_id'] = $tag->term_id;
                        $tags_detail[$count]['name'] = $tag->name;
                        $tags_detail[$count]['slug'] = $tag->slug;
                        $tags_detail[$count]['term_taxonomy_id'] = $tag->term_taxonomy_id;
                        $tags_detail[$count]['description'] = $tag->description;
                        $count++;
                    }
                }
            }

            return $tags_detail;
        }

	    // MARK: Apply Shipping Rules
        /**
         * Apply shipping rules based on Odfl package and settings.
         *
         * @param array $unishippers_ltl_package request to get quotes
         * @param boolean $apply_on_rates whether to apply rules on rates
         * @param object $rates quotes response
         * @return boolean | object returns if rule is applied or modified rates
         */
        function apply_shipping_rules($unishippers_ltl_package, $apply_on_rates = false, $rates = [], $loc_id = '')
        {
            if (empty($unishippers_ltl_package)) return $apply_on_rates ? $rates : false;

            global $wpdb;
            $qry = "SELECT * FROM " . $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules"; 
            $rules = $wpdb->get_results($qry, ARRAY_A);

            if (empty($rules)) return $apply_on_rates ? $rates : false;
        
            $is_rule_applied = false;
            foreach ($rules as $rule) {
                if (!$rule['is_active']) continue;

                $settings = isset($rule['settings']) ? json_decode($rule['settings'], true) : [];
                if (empty($settings)) continue;

                $rule_type = isset($rule['type']) ? $rule['type'] : '';

                if ($rule_type == 'Override Rates' && $apply_on_rates) {
                    $rates = $this->apply_override_rates_rule($unishippers_ltl_package, $settings, $rates, $loc_id);
                } else if ($rule_type == 'Hide Methods') {
                    $is_rule_applied = $this->apply_hide_methods_rule($settings, $unishippers_ltl_package);
                    if ($is_rule_applied) break;
                }
            }

            return $apply_on_rates ? $rates : $is_rule_applied;
        }

        /**
         * Apply the rule to the given settings and package.
         *
         * @param array $settings The settings for the rule.
         * @param array $unishippers_ltl_package The package to apply the rule to.
         * @return bool Whether the rule was applied or not.
        */
        function apply_hide_methods_rule($settings, $unishippers_ltl_package)
        {
            $is_rule_applied = false;

            if ($settings['apply_to'] == 'cart') {
                $formatted_values = $this->get_formatted_values($unishippers_ltl_package);
                $is_rule_applied = $this->apply_rule_filters($settings, $formatted_values);
            } else {
                foreach ($unishippers_ltl_package as $key => $pkg) {
                    $is_rule_applied = false;
                    $shipments = [];
                    $shipments[$key] = $pkg;

                    $formatted_values = $this->get_formatted_values($shipments);
                    $is_rule_applied = $this->apply_rule_filters($settings, $formatted_values);

                    if ($is_rule_applied) break;
                }
            }

            return $is_rule_applied;
        }

        /**
         * A function to apply override rates rule.
         *
         * @param array $unishippers_ltl_package request array to get the quotes
         * @param array $settings rule settings
         * @param object $rates quotes object
         * @return $rates The updated rates.
         */
        function apply_override_rates_rule($unishippers_ltl_package, $settings, $rates, $loc_id)
        {
            if (empty($rates)) return $rates;
            $updated_rates = $rates;

            foreach ($unishippers_ltl_package as $key => $pkg) {
                if ($key != $loc_id) continue;

                $is_rule_applied = false;
                $shipments = [];
                $shipments[$key] = $pkg;

                $formatted_values = $this->get_formatted_values($shipments);
                $is_rule_applied = $this->apply_rule_filters($settings, $formatted_values);

                if ($is_rule_applied) {
                    $updated_rates = $this->get_updated_rates($updated_rates, $settings);
                };
            }

            return $updated_rates;
        }

        /**
         * A function that updates rates based on settings and rule type.
         *
         * @param object $rates The rates to be updated.
         * @param array $settings The settings used for updating rates.
         * @return array The updated rates.
         */
        function get_updated_rates($rates, $settings)
        {
            if (empty($rates)) return $rates;

            $service_type = $settings['service'];
            $service_rate = $settings['service_rate'];
            $residential_status = isset($rates['quotes']->residentialStatus) && $rates['quotes']->residentialStatus == 'r';
            $liftgate_status = isset($rates['quotes']->liftGateStatus) && $rates['quotes']->liftGateStatus == 'l';
            
            if ($service_type == 'transportation_service') {
                $rates = $this->get_transportation_service_rates($rates, $service_rate);
            } elseif ($service_type == 'residential_delivery_service' && $residential_status) {
                $rates = $this->get_resi_or_lfg_service_rates($rates, $service_rate, 'residentialFee');
            } elseif ($service_type == 'liftgate_delivery_service' && $liftgate_status) {
                $rates = $this->get_resi_or_lfg_service_rates($rates, $service_rate, 'liftgateFee');
            }

            return $rates;
        }

        /**
         * Calculate the total weight, price, quantity, and tags for a list of shipments.
         *
         * @param array $shipments An array of shipments to process.
         * @return array The formatted values including weight, price, quantity, tags, and country.
         */
        function get_formatted_values($shipments)
        {
            $formatted_values = ['weight' => 0, 'price' => 0, 'quantity' => 0, 'tags' => []];

            foreach ($shipments as $pkg) {
                $formatted_values['weight'] += floatval($pkg['shipment_weight']);
                $formatted_values['price'] += floatval($pkg['product_prices']);
                $formatted_values['quantity'] += floatval($pkg['product_quantities']);
                $formatted_values['tags'] = array_merge($formatted_values['tags'], $pkg['product_tags']);
            }

            return $formatted_values;
        }

        /**
         * Apply rule filters to determine if the rule is applied.
         *
         * @param array $settings The settings for the rule filters
         * @param array $formatted_values The formatted values for comparison
         * @return bool Whether the rule filters are applied
         */
        function apply_rule_filters($settings, $formatted_values)
        {
            // If there is no filter check, then all rules will meet so rule will be treated as applied
            if (!$this->is_any_filter_checked($settings)) return true;

            $is_filter_applied = false;
            $filters = ['weight', 'price', 'quantity'];

            foreach ($filters as $filter) {
                if (filter_var($settings['filter_by_' . $filter], FILTER_VALIDATE_BOOLEAN)) {
                    $is_filter_applied = $formatted_values[$filter] >= $settings['filter_by_' . $filter . '_from'];
                    if ($is_filter_applied && !empty($settings['filter_by_' . $filter . '_to'])) {
                        $is_filter_applied = $formatted_values[$filter] < $settings['filter_by_' . $filter . '_to'];
                    }
                }

                if ($is_filter_applied) break;
            }

            if (!$is_filter_applied && filter_var($settings['filter_by_product_tag'], FILTER_VALIDATE_BOOLEAN)) {
                $product_tags = $settings['filter_by_product_tag_value'];
                $tags_check = array_filter($product_tags, function ($tag) use ($formatted_values) {
                    return in_array($tag, $formatted_values['tags']);
                });
                $is_filter_applied = count($tags_check) > 0;
            }

            return $is_filter_applied;
        }

        /**
         * A function that checks if any filter is checked based on the provided settings.
         *
         * @param array $settings The settings containing filter values.
         * @return bool Returns true if any filter is checked, false otherwise.
         */
        function is_any_filter_checked($settings)
        {
            $filters_checks = ['weight', 'price', 'quantity', 'product_tag'];
            
            // Check if any of the filter is checked
            $any_filter_checked = false;
            foreach ($filters_checks as $check) {
                if (isset($settings['filter_by_' . $check]) && filter_var($settings['filter_by_' . $check], FILTER_VALIDATE_BOOLEAN)) {
                    $any_filter_checked = true;
                    break;
                }
            }

            return $any_filter_checked;
        }
        
        /**
         * A function that updates service rates based on certain conditions.
         *
         * @param object $rates The object containing normal and direct service rates.
         * @param float $service_rate The service rate to be applied.
         * @return object The updated rates object after applying the service rate.
         */
        function get_transportation_service_rates($rates, $service_rate)
        {
            $_rates = ['q', 'quotesWithoutLiftGate'];
            $new_api_enabled = get_option('api_endpoint_unishippers_ltl') == 'unishippers_ltl_new_api';

            foreach ($_rates as $key) {
                if (!isset($rates['quotes']->{$key})) continue;

                $quote_results = (isset($rates['quotes']->{$key})) ? $rates['quotes']->{$key} : [];
                $quote_error = isset($rates['quotes']->{$key}->quoteSpeedFreightShipmentReturn->errorDescriptions) ? $rates['quotes']->{$key}->quoteSpeedFreightShipmentReturn->errorDescriptions : [];
                $quote_error = isset($rates['quotes']->severity) && $rates['quotes']->severity == 'ERROR' ? $rates['quotes']->Message : NULL;

                if (!empty($quote_error) || empty($quote_results)) continue;

                // loop through all the services and update the rate with the service rate
                foreach ($quote_results as $quote_key => $quote) {
                    if (empty($quote)) continue;

                    if ($new_api_enabled) $quote = $this->get_new_api_formatted_surcharges($quote);

                    $surcharges = isset($quote->accessorialCharges) ? $quote->accessorialCharges : [];
                    isset($quote->totalNetCharge) && $quote->totalNetCharge = floatval($service_rate) + $this->get_resi_and_lfg_fees($surcharges);
                    isset($quote->totalOfferPrice->value) && $quote->totalOfferPrice->value = floatval($service_rate) + $this->get_resi_and_lfg_fees($surcharges);

                    $quote_results[$quote_key] = $quote;
                }

                $rates['quotes']->{$key} = $quote_results;
            }

            return $rates;
        }

        /**
         * Updates the additional services rates in the given $rates object based on the $type and $service_rate.
         *
         * @param object $rates The object containing the service rates
         * @param string $service_rate The new service rate to be applied
         * @param string $type The type of service rate to be updated
         * @return object The updated $rates object
         */
        function get_resi_or_lfg_service_rates($rates, $service_rate, $type)
        {
            $_rates = ['q', 'quotesWithoutLiftGate'];
            $surcharges_types = ['residentialFee', 'liftgateFee'];
            $new_api_enabled = get_option('api_endpoint_unishippers_ltl') == 'unishippers_ltl_new_api';

            foreach ($_rates as $key) {
                if (!isset($rates['quotes']->{$key})) continue;

                $quote_results = (isset($rates['quotes']->{$key})) ? $rates['quotes']->{$key} : [];
                $quote_error = isset($rates['quotes']->{$key}->quoteSpeedFreightShipmentReturn->errorDescriptions) ? $rates['quotes']->{$key}->quoteSpeedFreightShipmentReturn->errorDescriptions : [];
                $quote_error = isset($rates['quotes']->severity) && $rates['quotes']->severity == 'ERROR' ? $rates['quotes']->Message : NULL;

                if (!empty($quote_error) || empty($quote_results)) continue;

                foreach ($quote_results as $quote_key => $quote) {
                    if (empty($quote)) continue;

                    if ($new_api_enabled && empty($quote->accessorialCharges)) $quote = $this->get_new_api_formatted_surcharges($quote);

                    $surcharges = isset($quote->accessorialCharges) ? $quote->accessorialCharges : [];
                    if (empty($surcharges)) continue;

                    $surcharges_fee = 0;
                    $is_surcharge_exist = false;
                    foreach ($surcharges_types as $s_type) {
                        if ($s_type != $type || !isset($surcharges->$s_type) || empty($surcharges->$s_type)) continue;

                        $surcharges_fee = $surcharges->$s_type;
                        $quote->accessorialCharges->$s_type = $service_rate;
                        
                        if ($new_api_enabled) {
                            $surchargesList = isset($quote->surchargeList) && isset($quote->surchargeList[0]->chargeItemList) && !empty($quote->surchargeList[0]->chargeItemList) ? $quote->surchargeList[0]->chargeItemList : [];
                            
                            $surcharges = [];
                            foreach ($surchargesList as $s_key => $surcharge) {
                                if (isset($surcharge->customerChargeCode) && ($surcharge->customerChargeCode == 'LGDEL' || $surcharge->customerChargeCode == 'RESDEL') && isset($surcharge->customerPrice->value)) {
                                    $_key = $surcharge->customerChargeCode == 'LGDEL' ? 'liftgateFee' : 'residentialFee';
                                    if ($_key == $type) {
                                        $quote->surchargeList[0]->chargeItemList[$s_key]->customerPrice->value = $service_rate;
                                    }
                                }
                            }
                        }

                        $is_surcharge_exist = true;
                        break;
                    }

                    if (!$is_surcharge_exist) continue;

                    $rate_charge = isset($quote->totalNetCharge) ? $quote->totalNetCharge : 0;
                    $rate_charge = isset($quote->totalOfferPrice->value) ? $quote->totalOfferPrice->value : $rate_charge; 
                    $rate_charge = floatval($rate_charge) - floatval($surcharges_fee);
                    $rate_charge += floatval($service_rate);
                    isset($quote->totalNetCharge) && $quote->totalNetCharge = $rate_charge;
                    isset($quote->totalOfferPrice->value) && $quote->totalOfferPrice->value = $rate_charge;

                    $quote_results[$quote_key] = $quote;
                }

                $rates['quotes']->{$key} = $quote_results;
            }

            return $rates;
        }

        /**
         * Get the total fees for residential and liftgate delivery surcharges.
         *
         * @param object $surcharges An array of surcharges objects.
         * @return float The total surcharges fee.
         */
        function get_resi_and_lfg_fees($surcharges)
        {
            if (empty($surcharges)) return 0;
            
            $surcharges_fee = 0;
            $surcharges_types = ['residentialFee', 'liftgateFee'];
            foreach ($surcharges_types as $s_charge) {
                if (isset($surcharges->$s_charge) && !empty($surcharges->$s_charge) && $surcharges->$s_charge > 0) {
                    $surcharges_fee += floatval($surcharges->$s_charge);
                }
            }

            return $surcharges_fee;
        }

        function get_new_api_formatted_surcharges($quote)
        {
            $surchargesList = isset($quote->surchargeList) && isset($quote->surchargeList[0]->chargeItemList) && !empty($quote->surchargeList[0]->chargeItemList) ? $quote->surchargeList[0]->chargeItemList : [];
            if (empty($surchargesList)) return $quote;
            
            $surcharges = [];
            foreach ($surchargesList as $surcharge) {
                if (isset($surcharge->customerChargeCode) && ($surcharge->customerChargeCode == 'LGDEL' || $surcharge->customerChargeCode == 'RESDEL') && isset($surcharge->customerPrice->value)) {
                    $_key = $surcharge->customerChargeCode == 'LGDEL' ? 'liftgateFee' : 'residentialFee';
                    $surcharge_fee = isset($surcharge->customerPrice->value) ? $surcharge->customerPrice->value : 0;
                    $surcharges[$_key] = $surcharge_fee;
                }
            }

            $quote->accessorialCharges = (object) $surcharges;

            return $quote;
        }

        /**
         * Get the liftgate exclude limit.
         * @return int Returns the liftgate exclude limit or 0 if no limit found.
         */
        function get_liftgate_exclude_limit()
        {
            global $wpdb;
            $qry = "SELECT * FROM " . $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules"; 
            $rules = $wpdb->get_results($qry, ARRAY_A);

            if (empty($rules)) return 0;

            $liftgate_exclude_limit = 0;
            foreach ($rules as $rule) {
                if (!$rule['is_active']) continue;
                
                $settings = isset($rule['settings']) ? json_decode($rule['settings'], true) : [];
                if (empty($settings)) continue;

                $rule_type = isset($rule['type']) ? $rule['type'] : '';
                if ($rule_type == 'Liftgate Weight Restrictions' && !empty($settings['liftgate_weight_restrictions'])) {
                    $liftgate_exclude_limit = $settings['liftgate_weight_restrictions'];
                    break;
                }
            }

            return $liftgate_exclude_limit;
        }
    }
}

new EnUnishippersLtlShippingRulesAjaxReq();
