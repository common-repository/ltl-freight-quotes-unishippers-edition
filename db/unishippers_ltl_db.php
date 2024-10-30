<?php

/**
 * Unishippers Database
 *
 * @package      Unishippers Quotes
 * @author      Eniture-Technology
 */
if (!defined('ABSPATH')) {
    exit;
}


///
global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

function create_carriers_db_unishippers($network_wide = null)
{
    global $wpdb;
    $old_table = "wp_unishippers_freight_carriers";
    $new_table = $wpdb->prefix . "unishippers_freight";
    if ($wpdb->query("SHOW TABLES LIKE '" . $old_table . "'") != 0) {
        $wpdb->query("RENAME TABLE " . $old_table . " TO " . $new_table);
    }
    if ( is_multisite() && $network_wide ) {
        foreach (get_sites(['fields' => 'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            global $wpdb;
            $carrier_table = $wpdb->prefix . "unishippers_freight";
            if ($wpdb->query("SHOW TABLES LIKE '" . $carrier_table . "'") === 0) {
                $sql = 'CREATE TABLE ' . $carrier_table . '(
                    `id` int(10) NOT NULL AUTO_INCREMENT,
                    `unishippers_shipmentQuoteId` varchar(600) NOT NULL,
                    `unishippers_carrierSCAC` varchar(600) NOT NULL,
                    `unishippers_carrierName` varchar(600) NOT NULL,
                    `unishippers_transitDays` varchar(600) NOT NULL,
                    `unishippers_guaranteedService` varchar(600) NOT NULL,
                    `unishippers_highCostDeliveryShipment` varchar(600) NOT NULL,
                    `unishippers_interline` varchar(600) NOT NULL,
                    `unishippers_nmfcRequired` varchar(600) NOT NULL,
                    `unishippers_carrierNotifications` varchar(600) NOT NULL,
                    `carrier_logo` varchar(255) NOT NULL,
                    `carrier_status` varchar(8) NOT NULL,
                    PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1' ;

                dbDelta($sql);
            }
            restore_current_blog();
        }

    }else {
        global $wpdb;
            $carrier_table = $wpdb->prefix . "unishippers_freight";
            if ($wpdb->query("SHOW TABLES LIKE '" . $carrier_table . "'") === 0) {
                $sql = 'CREATE TABLE ' . $carrier_table . '(
                    `id` int(10) NOT NULL AUTO_INCREMENT,
                    `unishippers_shipmentQuoteId` varchar(600) NOT NULL,
                    `unishippers_carrierSCAC` varchar(600) NOT NULL,
                    `unishippers_carrierName` varchar(600) NOT NULL,
                    `unishippers_transitDays` varchar(600) NOT NULL,
                    `unishippers_guaranteedService` varchar(600) NOT NULL,
                    `unishippers_highCostDeliveryShipment` varchar(600) NOT NULL,
                    `unishippers_interline` varchar(600) NOT NULL,
                    `unishippers_nmfcRequired` varchar(600) NOT NULL,
                    `unishippers_carrierNotifications` varchar(600) NOT NULL,
                    `carrier_logo` varchar(255) NOT NULL,
                    `carrier_status` varchar(8) NOT NULL,
                    PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1' ;


            dbDelta($sql);
        }
    }
}

///



/**
 * Create Warehouse Table
 * @global $wpdb
 */
if (!function_exists('create_unishippers_ltl_wh_db')) {

    function create_unishippers_ltl_wh_db($network_wide = null)
    {
        if ( is_multisite() && $network_wide ) {

            foreach (get_sites(['fields'=>'ids']) as $blog_id) {
                switch_to_blog($blog_id);
                global $wpdb;
                $warehouse_table = $wpdb->prefix . "warehouse";
                if ($wpdb->query("SHOW TABLES LIKE '" . $warehouse_table . "'") === 0) {
                    $origin = 'CREATE TABLE ' . $warehouse_table . '(
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    city varchar(200) NOT NULL,
                    state varchar(200) NOT NULL,
                    address varchar(255) NOT NULL,
                    phone_instore varchar(255) NOT NULL,
                    zip varchar(200) NOT NULL,
                    country varchar(200) NOT NULL,
                    location varchar(200) NOT NULL,
                    nickname varchar(200) NOT NULL,
                    enable_store_pickup VARCHAR(255) NOT NULL,
                    miles_store_pickup VARCHAR(255) NOT NULL ,
                    match_postal_store_pickup VARCHAR(255) NOT NULL ,
                    checkout_desc_store_pickup VARCHAR(255) NOT NULL ,
                    enable_local_delivery VARCHAR(255) NOT NULL ,
                    miles_local_delivery VARCHAR(255) NOT NULL ,
                    match_postal_local_delivery VARCHAR(255) NOT NULL ,
                    checkout_desc_local_delivery VARCHAR(255) NOT NULL ,
                    fee_local_delivery VARCHAR(255) NOT NULL ,
                    suppress_local_delivery VARCHAR(255) NOT NULL,
                    origin_markup VARCHAR(255),
                    PRIMARY KEY  (id) )';
                    dbDelta($origin);
                }

                $myCustomer = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'enable_store_pickup'");
                if (!(isset($myCustomer->Field) && $myCustomer->Field == 'enable_store_pickup')) {

                    $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN enable_store_pickup VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN miles_store_pickup VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN match_postal_store_pickup VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN checkout_desc_store_pickup VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN enable_local_delivery VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN miles_local_delivery VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN match_postal_local_delivery VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN checkout_desc_local_delivery VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN fee_local_delivery VARCHAR(255) NOT NULL , "
                        . "ADD COLUMN suppress_local_delivery VARCHAR(255) NOT NULL", $warehouse_table));
                }

                $unishippers_origin_markup = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'origin_markup'");
                if (!(isset($unishippers_origin_markup->Field) && $unishippers_origin_markup->Field == 'origin_markup')) {
                    $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN origin_markup VARCHAR(255) NOT NULL", $warehouse_table));
                } 

                // Origin terminal address
                unishippers_freight_update_warehouse();
                restore_current_blog();
            }

        } else {
            global $wpdb;
            $warehouse_table = $wpdb->prefix . "warehouse";
            if ($wpdb->query("SHOW TABLES LIKE '" . $warehouse_table . "'") === 0) {
                $origin = 'CREATE TABLE ' . $warehouse_table . '(
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    city varchar(200) NOT NULL,
                    state varchar(200) NOT NULL,
                    address varchar(255) NOT NULL,
                    phone_instore varchar(255) NOT NULL,
                    zip varchar(200) NOT NULL,
                    country varchar(200) NOT NULL,
                    location varchar(200) NOT NULL,
                    nickname varchar(200) NOT NULL,
                    enable_store_pickup VARCHAR(255) NOT NULL,
                    miles_store_pickup VARCHAR(255) NOT NULL ,
                    match_postal_store_pickup VARCHAR(255) NOT NULL ,
                    checkout_desc_store_pickup VARCHAR(255) NOT NULL ,
                    enable_local_delivery VARCHAR(255) NOT NULL ,
                    miles_local_delivery VARCHAR(255) NOT NULL ,
                    match_postal_local_delivery VARCHAR(255) NOT NULL ,
                    checkout_desc_local_delivery VARCHAR(255) NOT NULL ,
                    fee_local_delivery VARCHAR(255) NOT NULL ,
                    suppress_local_delivery VARCHAR(255) NOT NULL,
                    origin_markup VARCHAR(255),
                    PRIMARY KEY  (id) )';
                dbDelta($origin);
            }

            $myCustomer = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'enable_store_pickup'");
            if (!(isset($myCustomer->Field) && $myCustomer->Field == 'enable_store_pickup')) {
                $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN enable_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN miles_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN match_postal_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN checkout_desc_store_pickup VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN enable_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN miles_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN match_postal_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN checkout_desc_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN fee_local_delivery VARCHAR(255) NOT NULL , "
                    . "ADD COLUMN suppress_local_delivery VARCHAR(255) NOT NULL", $warehouse_table));
            }

            $unishippers_origin_markup = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'origin_markup'");
            if (!(isset($unishippers_origin_markup->Field) && $unishippers_origin_markup->Field == 'origin_markup')) {
                $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN origin_markup VARCHAR(255) NOT NULL", $warehouse_table));
            }

            // Origin terminal address
            unishippers_freight_update_warehouse();
        }

    }

}
/**
 * Update warehouse
 */
function unishippers_freight_update_warehouse()
{
    // Origin terminal address
    // Terminal phone number
    global $wpdb;
    $warehouse_table = $wpdb->prefix . "warehouse";
    $warehouse_address = $wpdb->get_row("SHOW COLUMNS FROM " . $warehouse_table . " LIKE 'phone_instore'");
    if (!(isset($warehouse_address->Field) && $warehouse_address->Field == 'phone_instore')) {
        $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN address VARCHAR(255) NOT NULL", $warehouse_table));
        $wpdb->query(sprintf("ALTER TABLE %s ADD COLUMN phone_instore VARCHAR(255) NOT NULL", $warehouse_table));
    }
}
/**
 * Install Carriers On Activation
 */
if (!function_exists('unishippers_ltl_freihgt_installation_carrier')) {

    function unishippers_ltl_freihgt_installation_carrier($network_wide = null)
    {
        if ( is_multisite() && $network_wide ) {

            foreach (get_sites(['fields'=>'ids']) as $blog_id) {
                switch_to_blog($blog_id);
                $carriers_obj = new unishippers_freight_carriers();
                $create_class_obj = new unishippers_freight_carriers();
                $carriers_obj->carriers();
                if (!function_exists('create_unishippers_ltl_class')) {
                    $create_class_obj->create_unishippers_ltl_class();
                }
                restore_current_blog();
            }

        } else {
            $carriers_obj = new unishippers_freight_carriers();
            $create_class_obj = new unishippers_freight_carriers();
            $carriers_obj->carriers();
            if (!function_exists('create_unishippers_ltl_class')) {
                $create_class_obj->create_unishippers_ltl_class();
            }
        }

    }

}

/**
 * Truncate All Carriers On Deactivation
 */
if (!function_exists('unishippers_ltl_truncat_carrier_table')) {

    function unishippers_ltl_truncat_carrier_table($network_wide = null)
    {
        if ( is_multisite() && $network_wide ) {

            foreach (get_sites(['fields'=>'ids']) as $blog_id) {
                switch_to_blog($blog_id);
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                global $wpdb;
                $table_name = $wpdb->prefix . "unishippers_freight";
                $wpdb->query('TRUNCATE TABLE ' . $table_name);
                restore_current_blog();
            }

        } else {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            global $wpdb;
            $table_name = $wpdb->prefix . "unishippers_freight";
            $wpdb->query('TRUNCATE TABLE ' . $table_name);
        }

    }

}

/**
 * Create shipping rules database table
 */
function create_unishippers_ltl_shipping_rules_db($network_wide = null)
{
    if ( is_multisite() && $network_wide ) {

        foreach (get_sites(['fields'=>'ids']) as $blog_id) {
            switch_to_blog($blog_id);
            global $wpdb;
            $shipping_rules_table = $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules";

            if ($wpdb->query("SHOW TABLES LIKE '" . $shipping_rules_table . "'") === 0) {
                $query = 'CREATE TABLE ' . $shipping_rules_table . '(
                    id INT(10) NOT NULL AUTO_INCREMENT,
                    name VARCHAR(50) NOT NULL,
                    type VARCHAR(30) NOT NULL,
                    settings TEXT NULL,
                    is_active TINYINT(1) NOT NULL,
                    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                )';

                dbDelta($query);
            }

            restore_current_blog();
        }

    } else {
        global $wpdb;
        $shipping_rules_table = $wpdb->prefix . "eniture_unishippers_ltl_shipping_rules";

        if ($wpdb->query("SHOW TABLES LIKE '" . $shipping_rules_table . "'") === 0) {
            $query = 'CREATE TABLE ' . $shipping_rules_table . '(
                id INT(10) NOT NULL AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                type VARCHAR(30) NOT NULL,
                settings TEXT NULL,
                is_active TINYINT(1) NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id) 
            )';

            dbDelta($query);
        }
    }
}