﻿=== LTL Freight Quotes - Unishippers Edition ===
Contributors: enituretechnology
Tags: eniture,Unishippers,,LTL freight rates,LTL freight quotes, shipping estimates
Requires at least: 6.4
Tested up to: 6.6.2
Stable tag: 2.5.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Real-time Unishippers freight quotes from Unishippers. Fifteen day free trial.

== Description ==

Unishippers (unishippers.com ) is a third party logistics company that gives its customers access
to UPS and over 60 Unishippers freight carriers through a single account relationship. The plugin retrieves 
the Unishippers freight rates you negotiated Unishippers, takes action on them according to the plugin settings, and displays the
result as shipping charges in your WooCommerce shopping cart. To establish a Unishippers account call 1-800-758-7447.

**Key Features**

* Three rating options: Cheapest, Cheapest Options and Average.
* Custom label results displayed in the shopping cart.
* Control the number of options displayed in the shopping cart.
* Display transit times with returned quotes.
* Restrict the carrier list to omit specific carriers.
* Product specific freight classes.
* Support for variable products.
* Option to determine a product's class by using the built in density calculator.
* Option to include residential delivery fees.
* Option to include fees for lift gate service at the destination address.
* Option to mark up quoted rates by a set dollar amount or percentage.

**Requirements**

* WooCommerce 6.4 or newer.
* A Unishippers account number.
* Your username and password to Unishippers's online shipping system.
* Your Unishippers web services authentication key.
* A license from Eniture Technology.

== Installation ==

**Installation Overview**

Before installing this plugin you should have the following information handy:

* Your Unishippers account number.
* Your username and password to Unishippers's online shipping system.
* Your Unishippers web services authentication key.

If you need assistance obtaining any of the above information, contact your local Unishippers office
or call the [Unishippers](http://unishippers.com) corporate headquarters at 1-800-758-7447.

A more extensive and graphically illustrated set of instructions can be found on the *Documentation* tab at
[eniture.com](https://eniture.com/woocommerce-worldwide-express-unishippers_ltl-freight-plugin/).

**1. Install and activate the plugin**
In your WordPress dashboard, go to Plugins => Add New. Search for "eniture unishippers_ltl freight quotes", and click Install Now.
After the installation process completes, click the Activate Plugin link to activate the plugin.

**2. Get a license from Eniture Technology**
Go to [Eniture Technology](https://eniture.com/woocommerce-worldwide-express-unishippers_ltl-freight-plugin/) and pick a
subscription package. When you complete the registration process you will receive an email containing your license key and
your login to eniture.com. Save your login information in a safe place. You will need it to access your customer dashboard
where you can manage your licenses and subscriptions. A credit card is not required for the free trial. If you opt for the free
trial you will need to login to your [Eniture Technology](http://eniture.com) dashboard before the trial period expires to purchase
a subscription to the license. Without a paid subscription, the plugin will stop working once the trial period expires.

**3. Establish the connection**
Go to WooCommerce => Settings => Unishippers. Use the *Connection* link to create a connection to your Unishippers
account.

**4. Identify the carriers**
Go to WooCommerce => Settings => Unishippers. Use the *Carriers* link to identify which carriers you want to include in the 
dataset used as input to arrive at the result that is displayed in your cart. Including all carriers is highly recommended.

**5. Select the plugin settings**
Go to WooCommerce => Settings => Unishippers. Use the *Quote Settings* link to enter the required information and choose
the optional settings.

**6. Define warehouses and drop ship locations**
Go to WooCommerce => Settings => Unishippers. Use the *Warehouses* link to enter your warehouses and drop ship locations.  You should define at least one warehouse, even if all of your products ship from drop ship locations. Products are quoted as shipping from the warehouse closest to the shopper unless they are assigned to a specific drop ship location. If you fail to define a warehouse and a product isn’t assigned to a drop ship location, the plugin will not return a quote for the product. Defining at least one warehouse ensures the plugin will always return a quote.

**7. Enable the plugin**
Go to WooCommerce => Settings => Shipping. Click on the Shipping Zones link. Add a US domestic shipping zone if one doesn’t already exist. Click the “+” sign to add a shipping method to the US domestic shipping zone and choose SEFL from the list.

**8. Configure your products**
Assign each of your products and product variations a weight, Shipping Class and freight classification. Products shipping Unishippers freight should have the Shipping Class set to “Unishippers Freight”. The Freight Classification should be chosen based upon how the product would be classified in the NMFC Freight Classification Directory. If you are unfamiliar with freight classes, contact the carrier and ask for assistance with properly identifying the freight classes for your  products.

== Frequently Asked Questions ==

= What happens when my shopping cart contains products that ship Unishippers and products that would normally ship FedEx or UPS? =

If the shopping cart contains one or more products tagged to ship Unishippers freight, all of the products in the shopping cart 
are assumed to ship Unishippers freight. To ensure the most accurate quote possible, make sure that every product has a weight 
and dimensions recorded.

= What happens if I forget to identify a freight classification for a product? =

In the absence of a freight class, the plugin will determine the freight classification using the density calculation method. 
To do so the products weight and dimensions must be recorded.

= Why was the invoice I received from Unishippers more than what was quoted by the plugin? =

One of the shipment parameters (weight, dimensions, freight class) is different, or additional services (such as residential 
delivery, lift gate, delivery by appointment and others) were required. Compare the details of the invoice to the shipping 
settings on the products included in the shipment. Consider making changes as needed. Remember that the weight of the packaging 
materials,such as a pallet, is included by the carrier in the billable weight for the shipment.

= How do I find out what freight classification to use for my products? =

Contact your local Unishippers office for assistance. You might also consider getting a subscription to ClassIT offered
by the National Motor Freight Traffic Association (NMFTA). Visit them online at classit.nmfta.org.

= How do I get a Unishippers account number? =

Unishippers is a US national franchise organization. Check your phone book for local listings or call its corporate
office at 1-800-758-7447 and ask how to contact the sales office serving your area.

= Where do I find my Unishippers username and password? =

Usernames and passwords to Unishippers’s online shipping system are issued by Unishippers. Contact the Unishippers office servicing your account to request them. If you don’t have a Unishippers account, contact the Unishippers corporate office at 1-800-758-7447.

= Where do I get my Unishippers authentication key? =

You can can request an authentication key by logging into Unishippers’s online shipping system (unishippers.com) and
navigating to Services > Web Services. An authentication key will be emailed to you, usually within the hour.

= How do I get a license key for my plugin? =

You must register your installation of the plugin, regardless of whether you are taking advantage of the trial period or 
purchased a license outright. At the conclusion of the registration process an email will be sent to you that will include the 
license key. You can also login to eniture.com using the username and password you created during the registration process 
and retrieve the license key from the My Licenses tab.

= How do I change my plugin license from the trail version to one of the paid subscriptions? =

Login to eniture.com and navigate to the My Licenses tab. There you will be able to manage the licensing of all of your 
Eniture Technology plugins.

= How do I install the plugin on another website? =

The plugin has a single site license. To use it on another website you will need to purchase an additional license. 
If you want to change the website with which the plugin is registered, login to eniture.com and navigate to the My Licenses tab. 
There you will be able to change the domain name that is associated with the license key.

= Do I have to purchase a second license for my staging or development site? =

No. Each license allows you to identify one domain for your production environment and one domain for your staging or 
development environment. The rate estimates returned in the staging environment will have the word “Sandbox” appended to them.

= Why isn’t the plugin working on my other website? =

If you can successfully test your credentials from the Connection page (WooCommerce > Settings > Unishippers > Connections) 
then you have one or more of the following licensing issues:

1) You are using the license key on more than one domain. The licenses are for single sites. You will need to purchase an additional license.
2) Your trial period has expired.
3) Your current license has expired and we have been unable to process your form of payment to renew it. Login to eniture.com and go to the My Licenses tab to resolve any of these issues.

== Screenshots ==

1. Carrier inclusion page
2. Quote settings page
3. Quotes displayed in cart

== Changelog ==

= 2.5.8 =
* Update: Introduced an error management feature.
* Update: Introduced a liftgate weight restriction rule.
* Update: Introduced backup rates.**
* Fix: Corrected the order of the plugin tabs.
* Fix: Resolved issues with the calculation of live shipping rates in draft orders.

= 2.5.7 =
* Fix: Fix: Corrected the link for Unishippers Freight account

= 2.5.6 =
* Fix: Fixed issue with slow loading of variant products

= 2.5.5 =
* Fix: Fixed a liftgate problem within the new API. 

= 2.5.4 =
* Update: Compatibility with WordPress version 6.5.3
* Update: Compatibility with PHP version 8.2.0
* Fix:  Incorrect product variants displayed in the order widget.

= 2.5.3 =
* Update: Added an option in the quotes settings to suppress or allow parcel rates when the Less Than Truckload (LTL) threshold is met. 

= 2.5.2 =
* Update: Introduced a field for the maximum weight per handling unit.
* Update: Updated the description text in the warehouse.

= 2.5.1 =
* Update: Changed required plan from standard to basic for delivery estimate options.

= 2.5.0 =
* Update: Display "Free Shipping" at checkout when handling fee in the quote settings is  -100% .
* Update: Introduced the Shipping Logs feature.
* Update:  Introduced “product level markup” and “origin level markup”.

= 2.4.3 =
* Update: Compatibility with WooCommerce HPOS(High-Performance Order Storage)

= 2.4.2 =
* Update: Add programming to switch the Worldwide account to New/Old API.  

= 2.4.1 =
* Update: Added programming to automatically switch Worldwide Express account on new API.

= 2.4.0 =
* Update: Introduced Worldwide Express new API OAuth process with client ID and client secret.

= 2.3.7 =
* Update: Modified expected delivery message at front-end from “Estimated number of days until delivery” to “Expected delivery by”.
* Fix: Inherent Flat Rate value of parent to variations.
* Fix: Fixed space character issue in city name. 


= 2.3.6 =
* Update: Text changes in FreightDesk.Online coupon expiry notice.

= 2.3.5 =
* Update: Added compatibility with "Address Type Disclosure" in Residential address detection

= 2.3.4 =
* Update: Compatibility with Flat Rate Shipping

= 2.3.3 =
* Update: Compatibility with WordPress version 6.1
* Update: Compatibility with WooCommerce version 7.0.1

= 2.3.2 =
* Update: Introduced compatibility with the WooCommerce plugin "WooCommerce Blocks"

= 2.3.1 =
* Fix: Fixed carriers disappeared after updating the plugin. 

= 2.3.0 =
* Update: Introduced connectivity from the plugin to FreightDesk.Online using Company ID 
* Update: Compatibility with WordPress multisite network
* Update: Compatibility with microwarehouse add-don

= 2.2.2 =
* Update: By default mark all carriers checked.

= 2.2.1 =
* Update: Added new carriers 'GLOVA-LINK CORPORATION', 'Total Transportation' and 'Xpress Global'

= 2.2.0 =
* Update: Introduced coupon code for freightdesk.online and validate-addresses.com.

= 2.1.3 =
* Update: Compatibility with WordPress multisite network
* Fix: Fixed support link.

= 2.1.2 =
* Update: Compatibility with PHP version 8.1.
* Update: Compatibility with WordPress version 5.9.

= 2.1.1 =
* Update: Relocation of NMFC Number field along with freight class.

= 2.1.0 =
* Update: Updated compatibility with the Pallet Packaging plugin and analytics.

= 2.0.0 =
* Update: Compatibility with PHP version 8.0.
* Update: Compatibility with WordPress version 5.8.
* Fix: Corrected product page URL in connection settings tab.

= 1.3.1 =
* Update: Added feature "Weight threshold limit".
* Update: Added feature In-store pickup with terminal information.

= 1.3.0 =
* Update: Cuttoff Time
* Update: Added images URL for FDO portal
* Update: CSV columns updated
* Update: Compatibility with Shippable addon
* Update: Compatibility with Micro-warehouse addon

= 1.2.0 =
* Update: Introduced new features, Order detail widget for draft orders, improved order detail widget for Freightdesk.online, compatibly with Shippable add-on, compatibly with Account Details(ET) add-don(Capturing account number on checkout page).

= 1.1.1 =
* Update: "BC Freightways" new carrier introduced.

= 1.1.0 =
* Update: Compatibility with WordPress 5.6

= 1.0.5 =
* Update: This update introduces: 1) Compatibility with freightdesk.online. 2) Product nesting feature. 3) Added order detail widget. 4) Fixed suppress live rates according to local delivery settings.

= 1.0.4 =
* Update: added carriers list.

= 1.0.3 =
* Update: Compatibility with WordPress 5.5

= 1.0.2 =
* Update: Published on wordpress.org

= 1.0.1 =
* Fix: Compatibility with Small Package Quotes

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

