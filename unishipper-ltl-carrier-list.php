<?php

/**
 * Unishippers Carriers
 *
 * @package     Unishippers Quotes
 * @author      Eniture-Technology
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class unishippers_freight_carriers
 */
if (!class_exists('unishippers_freight_carriers')) {

    class unishippers_freight_carriers
    {
        /**
         * Carriers
         * @global $wpdb
         */
        function carriers()
        {

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            global $wpdb;
            $table_name = $wpdb->prefix . "unishippers_freight";
            $installed_carriers = $wpdb->get_results("SELECT COUNT(*) AS carriers FROM " . $table_name);
            if ($installed_carriers[0]->carriers < 1) {
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'AACT',
                    'unishippers_carrierName' => 'AAA Cooper',
                    'carrier_logo' => 'aact.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CENF',
                    'unishippers_carrierName' => 'Central Freight Lines',
                    'carrier_logo' => 'cenf.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CLNI',
                    'unishippers_carrierName' => 'Clear Lane Freight Systems',
                    'carrier_logo' => 'clni.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CNWY',
                    'unishippers_carrierName' => 'XPO Logistics',
                    'carrier_logo' => 'cnwy.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CTII',
                    'unishippers_carrierName' => 'Central Transport Intl',
                    'carrier_logo' => 'ctii.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DAFG',
                    'unishippers_carrierName' => 'Dayton Freight',
                    'carrier_logo' => 'dafg.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DHRN',
                    'unishippers_carrierName' => 'Dohrn',
                    'carrier_logo' => 'dhrn.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DYLT',
                    'unishippers_carrierName' => 'Daylight Transportation',
                    'carrier_logo' => 'dylt.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'EXLA',
                    'unishippers_carrierName' => 'Estes Express Lines',
                    'carrier_logo' => 'exla.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'HMES',
                    'unishippers_carrierName' => 'USF Holland',
                    'carrier_logo' => 'hmes.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'MIDW',
                    'unishippers_carrierName' => 'Midwest Motor',
                    'carrier_logo' => 'midw.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'OAKH',
                    'unishippers_carrierName' => 'Oak Harbor Freight',
                    'carrier_logo' => 'oakh.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'ODFL',
                    'unishippers_carrierName' => 'Old Dominion',
                    'carrier_logo' => 'odfl.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RDFS',
                    'unishippers_carrierName' => 'Roadrunner Freight',
                    'carrier_logo' => 'rdfs.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RDWY',
                    'unishippers_carrierName' => 'YRC Worldwide',
                    'carrier_logo' => 'rdwy.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RETL',
                    'unishippers_carrierName' => 'USF Reddaway',
                    'carrier_logo' => 'retl.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RLCA',
                    'unishippers_carrierName' => 'R L Carriers',
                    'carrier_logo' => 'rlca.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'SAIA',
                    'unishippers_carrierName' => 'SAIA',
                    'carrier_logo' => 'saia.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'SEFL',
                    'unishippers_carrierName' => 'Southeastern Freight',
                    'carrier_logo' => 'sefl.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'UPGF',
                    'unishippers_carrierName' => 'TForce Freight',
                    'carrier_logo' => 'tforce.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'WARD',
                    'unishippers_carrierName' => 'Ward Trucking',
                    'carrier_logo' => 'ward.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'UPSF',
                    'unishippers_carrierName' => 'UPS Supply Chain Solutions',
                    'carrier_logo' => 'ups-supply-chain.jpg',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'PAAF',
                    'unishippers_carrierName' => 'PILOT FREIGHT SERVICES',
                    'carrier_logo' => 'Pilot.jpg',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'LMEL',
                    'unishippers_carrierName' => 'LME',
                    'carrier_logo' => 'lme.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'UPPN',
                    'unishippers_carrierName' => 'US Special Delivery Inc',
                    'carrier_logo' => 'us-special.jpeg',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'FCSY',
                    'unishippers_carrierName' => 'FrontLine Freight',
                    'carrier_logo' => 'frontLine-freight.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'FWDA',
                    'unishippers_carrierName' => 'ForwardAir',
                    'carrier_logo' => 'forward-air.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'NPME',
                    'unishippers_carrierName' => 'New Penn Motor Express Inc',
                    'carrier_logo' => 'newpennmotorexpress.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RXIC',
                    'unishippers_carrierName' => 'Ross Express',
                    'carrier_logo' => 'rossexpress.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'SMTL',
                    'unishippers_carrierName' => 'Southwestern Motor Transport',
                    'carrier_logo' => 'southwesternmotor.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'BEAV',
                    'unishippers_carrierName' => 'Beaver Express Service LLC',
                    'carrier_logo' => 'beaverexpress.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DPHE',
                    'unishippers_carrierName' => 'Dependable Highway Express',
                    'carrier_logo' => 'dependhighwayexpress.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'GOJI',
                    'unishippers_carrierName' => 'DICOM Freight',
                    'carrier_logo' => 'dicomfreight.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'ETPE',
                    'unishippers_carrierName' => 'STG Express',
                    'carrier_logo' => 'stgexpress.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'JPXS',
                    'unishippers_carrierName' => 'JP Express',
                    'carrier_logo' => 'jpexpress.gif',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'LAEA',
                    'unishippers_carrierName' => 'Land Air Express',
                    'carrier_logo' => 'land-air-express.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'MTVL',
                    'unishippers_carrierName' => 'Mountain Valley Express',
                    'carrier_logo' => 'mountainvalleyexpress.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'NMTF',
                    'unishippers_carrierName' => 'N&M Transfer Co Inc',
                    'carrier_logo' => 'nmtransfer.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'PITD',
                    'unishippers_carrierName' => 'Pitt Ohio',
                    'carrier_logo' => 'pittohio.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'STDF',
                    'unishippers_carrierName' => 'Standard Forwarding',
                    'carrier_logo' => 'tandardfowarding.jpg',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'BRTC',
                    'unishippers_carrierName' => 'BC Freightways',
                    'carrier_logo' => 'brtc.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'GVKC',
                    'unishippers_carrierName' => 'Glova-Link Corporation',
                    'carrier_logo' => 'gvkc.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'TOTL',
                    'unishippers_carrierName' => 'Total Transportation',
                    'carrier_logo' => 'totl.png',
                    'carrier_status' => '1'
                ));

                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'XGSI',
                    'unishippers_carrierName' => 'Xpress Global',
                    'carrier_logo' => 'xgs.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'PYLE',
                    'unishippers_carrierName' => 'A Duie PYLE',
                    'carrier_logo' => 'pyle.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'ABFS',
                    'unishippers_carrierName' => 'ABF Freight System, Inc',
                    'carrier_logo' => 'abfs.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'AMAP',
                    'unishippers_carrierName' => 'AMA Transportation Company Inc',
                    'carrier_logo' => 'amap.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'APXT',
                    'unishippers_carrierName' => 'APEX XPRESS',
                    'carrier_logo' => 'apxt.png',
                    'carrier_status' => '1' 
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'ATMR',
                    'unishippers_carrierName' => 'Atlas Motor Express',
                    'carrier_logo' => 'atmr.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'AVRT',
                    'unishippers_carrierName' => 'Averitt Express, Inc',
                    'carrier_logo' => 'averitt.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'BCKT',
                    'unishippers_carrierName' => 'Becker Trucking Inc',
                    'carrier_logo' => 'bckt.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'BTVP',
                    'unishippers_carrierName' => 'Best Overnite Express',
                    'carrier_logo' => 'btvp.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CXRE',
                    'unishippers_carrierName' => 'Cal State Express',
                    'carrier_logo' => 'cxre.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CPCD',
                    'unishippers_carrierName' => 'Cape Cod Express',
                    'carrier_logo' => 'cpcd.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CGOJ',
                    'unishippers_carrierName' => 'Cargomatic ',
                    'carrier_logo' => 'Cargomatic.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CAZF',
                    'unishippers_carrierName' => 'Central Arizona Freight Lines',
                    'carrier_logo' => 'cazf.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CCYQ',
                    'unishippers_carrierName' => 'CrossCountry Freight Solutions',
                    'carrier_logo' => 'CCYQ.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'CTBV',
                    'unishippers_carrierName' => 'CTBV Custom Companies',
                    'carrier_logo' => 'cbtv.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DTST',
                    'unishippers_carrierName' => 'DATS Trucking Inc',
                    'carrier_logo' => 'dtst.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DDPP',
                    'unishippers_carrierName' => 'Dedicated Delivery Professionals',
                    'carrier_logo' => 'ddpp.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'DUBL',
                    'unishippers_carrierName' => 'Dugan Truck Lines',
                    'carrier_logo' => 'dubl.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'FLAN',
                    'unishippers_carrierName' => 'Flo Trans',
                    'carrier_logo' => 'flan.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'FTSC',
                    'unishippers_carrierName' => 'Fort Transportation',
                    'carrier_logo' => 'ftsc.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'GLDF',
                    'unishippers_carrierName' => 'Gold Coast Freightways',
                    'carrier_logo' => 'gldf.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'HMES',
                    'unishippers_carrierName' => 'Holland',
                    'carrier_logo' => 'hmes.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'LKVL',
                    'unishippers_carrierName' => 'Lakeville Motor Express Inc',
                    'carrier_logo' => 'lkvl.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'MTJG',
                    'unishippers_carrierName' => 'MTJG Moran Transportation',
                    'carrier_logo' => 'mtjg.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'NEBT',
                    'unishippers_carrierName' => 'Nebraska Transport',
                    'carrier_logo' => 'nebt.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'NEMF',
                    'unishippers_carrierName' => 'New England Motor Freight',
                    'carrier_logo' => 'nemf.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'NOPK',
                    'unishippers_carrierName' => 'North Park Transportation Co',
                    'carrier_logo' => 'nopk.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'PMLI',
                    'unishippers_carrierName' => 'Pace Motor Lines, Inc',
                    'carrier_logo' => 'pmli.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'PNII',
                    'unishippers_carrierName' => 'ProTrans International',
                    'carrier_logo' => 'pnii.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'RJWI',
                    'unishippers_carrierName' => 'RJW Transport',
                    'carrier_logo' => 'rjwi.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'ROSI',
                    'unishippers_carrierName' => 'Roseville Motor Express',
                    'carrier_logo' => 'rosi.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'SHIF',
                    'unishippers_carrierName' => 'Shift Freight',
                    'carrier_logo' => 'shif.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'SVSE',
                    'unishippers_carrierName' => 'SuperVan Service Co. Inc',
                    'carrier_logo' => 'svse.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'WEBE',
                    'unishippers_carrierName' => 'West Bend Transit',
                    'carrier_logo' => 'webe.png',
                    'carrier_status' => '1'
                ));
                $wpdb->insert(
                    $table_name, array(
                    'unishippers_carrierSCAC' => 'WTVA',
                    'unishippers_carrierName' => 'Wilson Trucking Corporation',
                    'carrier_logo' => 'wtva.png',
                    'carrier_status' => '1'
                ));
            }else{
                
                $glova_carrier = $wpdb->get_results("SELECT COUNT(*) AS carriers FROM " . $table_name . " where unishippers_carrierSCAC = 'GVKC'");
                if (isset($glova_carrier[0], $glova_carrier[0]->carrier) && $glova_carrier[0]->carrier < 1) {
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'GVKC',
                            'unishippers_carrierName' => 'Glova-Link Corporation',
                            'carrier_logo' => 'gvkc.png',
                            'carrier_status' => '1'
                        )
                    );
                }

                $totl_carrier = $wpdb->get_results("SELECT COUNT(*) AS carriers FROM " . $table_name . " where unishippers_carrierSCAC = 'TOTL'");
                if (isset($totl_carrier[0], $totl_carrier[0]->carrier) && $totl_carrier[0]->carrier < 1) {
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'TOTL',
                            'unishippers_carrierName' => 'Total Transportation',
                            'carrier_logo' => 'totl.png',
                            'carrier_status' => '1'
                        )
                    );
                }

                $xgs_carrier = $wpdb->get_results("SELECT COUNT(*) AS carriers FROM " . $table_name . " where unishippers_carrierSCAC = 'XGSI'");
                if (isset($xgs_carrier[0], $xgs_carrier[0]->carrier) && $xgs_carrier[0]->carrier < 1) {
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'XGSI',
                            'unishippers_carrierName' => 'Xpress Global',
                            'carrier_logo' => 'xgs.png',
                            'carrier_status' => '1'
                        )
                    );
                }
                
                $abf_carrier = $wpdb->get_results("SELECT COUNT(*) AS carriers FROM " . $table_name . " where unishippers_carrierSCAC = 'ABFS'");
                if (isset($abf_carrier[0], $abf_carrier[0]->carrier) && $abf_carrier[0]->carrier < 1) {
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'PYLE',
                            'unishippers_carrierName' => 'A Duie PYLE',
                            'carrier_logo' => 'pyle.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'ABFS',
                            'unishippers_carrierName' => 'ABF Freight System, Inc',
                            'carrier_logo' => 'abfs.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'AMAP',
                            'unishippers_carrierName' => 'AMA Transportation Company Inc',
                            'carrier_logo' => 'amap.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'APXT',
                            'unishippers_carrierName' => 'APEX XPRESS',
                            'carrier_logo' => 'apxt.png',
                            'carrier_status' => '1' 
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'ATMR',
                            'unishippers_carrierName' => 'Atlas Motor Express',
                            'carrier_logo' => 'atmr.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'AVRT',
                            'unishippers_carrierName' => 'Averitt Express, Inc',
                            'carrier_logo' => 'averitt.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'BCKT',
                            'unishippers_carrierName' => 'Becker Trucking Inc',
                            'carrier_logo' => 'bckt.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'BTVP',
                            'unishippers_carrierName' => 'Best Overnite Express',
                            'carrier_logo' => 'btvp.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CXRE',
                            'unishippers_carrierName' => 'Cal State Express',
                            'carrier_logo' => 'cxre.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CPCD',
                            'unishippers_carrierName' => 'Cape Cod Express',
                            'carrier_logo' => 'cpcd.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CGOJ',
                            'unishippers_carrierName' => 'Cargomatic ',
                            'carrier_logo' => 'cargomatic.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CAZF',
                            'unishippers_carrierName' => 'Central Arizona Freight Lines',
                            'carrier_logo' => 'cazf.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CCYQ',
                            'unishippers_carrierName' => 'CrossCountry Freight Solutions',
                            'carrier_logo' => 'CCYQ.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'CTBV',
                            'unishippers_carrierName' => 'CTBV Custom Companies',
                            'carrier_logo' => 'cbtv.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'DTST',
                            'unishippers_carrierName' => 'DATS Trucking Inc',
                            'carrier_logo' => 'dtst.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'DDPP',
                            'unishippers_carrierName' => 'Dedicated Delivery Professionals',
                            'carrier_logo' => 'ddpp.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'DUBL',
                            'unishippers_carrierName' => 'Dugan Truck Lines',
                            'carrier_logo' => 'dubl.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'FLAN',
                            'unishippers_carrierName' => 'Flo Trans',
                            'carrier_logo' => 'flan.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'FTSC',
                            'unishippers_carrierName' => 'Fort Transportation',
                            'carrier_logo' => 'ftsc.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'GLDF',
                            'unishippers_carrierName' => 'Gold Coast Freightways',
                            'carrier_logo' => 'gldf.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'HMES',
                            'unishippers_carrierName' => 'Holland',
                            'carrier_logo' => 'hmes.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'LKVL',
                            'unishippers_carrierName' => 'Lakeville Motor Express Inc',
                            'carrier_logo' => 'lkvl.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'MTJG',
                            'unishippers_carrierName' => 'MTJG Moran Transportation',
                            'carrier_logo' => 'mtjg.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'NEBT',
                            'unishippers_carrierName' => 'Nebraska Transport',
                            'carrier_logo' => 'nebt.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'NEMF',
                            'unishippers_carrierName' => 'New England Motor Freight',
                            'carrier_logo' => 'nemf.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'NOPK',
                            'unishippers_carrierName' => 'North Park Transportation Co',
                            'carrier_logo' => 'nopk.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'PMLI',
                            'unishippers_carrierName' => 'Pace Motor Lines, Inc',
                            'carrier_logo' => 'pmli.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'PNII',
                            'unishippers_carrierName' => 'ProTrans International',
                            'carrier_logo' => 'pnii.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'RJWI',
                            'unishippers_carrierName' => 'RJW Transport',
                            'carrier_logo' => 'rjwi.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'ROSI',
                            'unishippers_carrierName' => 'Roseville Motor Express',
                            'carrier_logo' => 'rosi.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'SHIF',
                            'unishippers_carrierName' => 'Shift Freight',
                            'carrier_logo' => 'shif.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'SVSE',
                            'unishippers_carrierName' => 'SuperVan Service Co. Inc',
                            'carrier_logo' => 'svse.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'UPGF',
                            'unishippers_carrierName' => 'TForce Freight',
                            'carrier_logo' => 'tforce.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'WEBE',
                            'unishippers_carrierName' => 'West Bend Transit',
                            'carrier_logo' => 'webe.png',
                            'carrier_status' => '1'
                        )
                    );
                    $wpdb->insert(
                        $table_name, array(
                            'unishippers_carrierSCAC' => 'WTVA',
                            'unishippers_carrierName' => 'Wilson Trucking Corporation',
                            'carrier_logo' => 'wtva.png',
                            'carrier_status' => '1'
                        )
                    );
                }
            }
        }

        /**
         * Create LTL Class
         */
        function create_unishippers_ltl_class()
        {

            wp_insert_term(
                'LTL Freight', 'product_shipping_class', array(
                    'description' => 'The plugin is triggered to provide an LTL freight quote when the shopping cart contains an item that has a designated shipping class. Shipping class? is a standard WooCommerce parameter not to be confused with freight class? or the NMFC classification system.',
                    'slug' => 'ltl_freight'
                )
            );
        }

    }

}
