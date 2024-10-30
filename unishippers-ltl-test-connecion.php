<?php

/**
 * Unishippers Test connection
 *
 * @package     Unishippers Quotes
 * @author      Eniture-Technology
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Test connection Function
 */
if (!function_exists('unishippers_freight_submit')) {

    function unishippers_freight_submit()
    {

        $sp_user = sanitize_text_field($_POST['unishippers_username']);
        $sp_pass = sanitize_text_field($_POST['unishippers_password']);
        $api_token = sanitize_text_field($_POST['api_token']);
        $sp_acc = sanitize_text_field($_POST['unishippers_account_number']);
        $sp_licence_key = sanitize_text_field($_POST['unishippers_licence_key']);
        $sp_unishippers_account_id = sanitize_text_field($_POST['unishippers_account_id']);
        $sp_client_id = sanitize_text_field($_POST['unishippers_client_id']);
        $sp_client_secret = sanitize_text_field($_POST['unishippers_client_secret']);
        $api_end_point = sanitize_text_field($_POST['api_end_point']);

        $domain = unishippers_freight_get_domain();

        if ($api_end_point == 'unishippers_ltl_new_api') {
            $post = array(
                'plugin_licence_key' => $sp_licence_key,
                'plugin_domain_name' => unishippers_freight_parse_url($domain),
                'speed_freight_username' => $sp_user,
                'speed_freight_password' => $sp_pass,
                'world_wide_express_account_number' => $sp_acc,
                'clientId' => $sp_client_id,
                'clientSecret' => $sp_client_secret,
                'ApiVersion' => '2.0',
                'isUnishipperNewApi' => 'yes',
                'requestFromUnishippersLTL' => '1'
            );    
        } else {
            $post = array(
                'licence_key' => $sp_licence_key,
                'server_name' => unishippers_freight_parse_url($domain),
                'username' => $sp_user,
                'password' => $sp_pass,
                'accountNumber' => $sp_acc,
                'id' => $sp_unishippers_account_id,
                'apiToken' => $api_token,
                'platform' => 'WordPress',
                'carrierName' => 'unishippersLtl',
                'carrier_mode' => 'test',
            );
        }

        if (is_array($post) && count($post) > 0) {

            $url = UNISHIPPERS_FREIGHT_DOMAIN_HITTING_URL . '/index.php';
            if ($api_end_point == 'unishippers_ltl_new_api') {
                $url = UNISHIPPERS_FREIGHT_NEW_API_DOMAIN_HITTING_URL . '/carriers/wwe-freight/speedfreightTest.php';
            }
            
            $unishippers_ltl_curl_obj = new Unishippers_Curl_Request();
            $output = $unishippers_ltl_curl_obj->unishippers_freight_get_curl_response($url, $post);

            print_r($output);
            die;
        }
    }

    add_action('wp_ajax_nopriv_unishippers_ltl_validate_keys', 'unishippers_freight_submit');
    add_action('wp_ajax_unishippers_ltl_validate_keys', 'unishippers_freight_submit');
}

/**
 * URL parsing
 * @param $domain
 * @return url
 */
if (!function_exists('unishippers_freight_parse_url')) {

    function unishippers_freight_parse_url($domain)
    {
        $domain = trim($domain);
        $parsed = parse_url($domain);
        if (empty($parsed['scheme'])) {

            $domain = 'http://' . ltrim($domain, '/');
        }
        $parse = parse_url($domain);
        $refinded_domain_name = $parse['host'];
        $domain_array = explode('.', $refinded_domain_name);
        if (in_array('www', $domain_array)) {

            $key = array_search('www', $domain_array);
            unset($domain_array[$key]);
            if(phpversion() < 8) {
                $refinded_domain_name = implode($domain_array, '.'); 
            }else {
                $refinded_domain_name = implode('.', $domain_array);
            }
        }

        return $refinded_domain_name;
    }

}
