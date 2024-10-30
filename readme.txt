=== Easy Buy Now Button by Ntekg ===
Contributors: ntekg
Donate link: http://easy-paypal-buy-now-button.ntekg.com
Tags: paypal, button, buy now, ecommerce, shortcode, buy now button, paypal button, paypal buy now button, paypal plugin, paypal plugin for wordpress
Requires at least: 3.0
Tested up to: 5.0.1
Stable tag: 3.0.4
Requires PHP: 5.2.4
License: GPLv2 or later
Easy Buy Now Button by Ntekg gives you the power to create PayPal Buy Now buttons wherever you choose, by simply adding shortcodes to post or page. 
== Description ==

Easy Buy Now Button by Ntekg plugin is a convenient and flexible way to add PayPal Buy Now buttons anywhere on your WordPress site.

Place as many buttons on a page as you like without the shopping cart and other complicated selling solutions. Easy Buy Now Button by Ntekg plugin is both powerful and flexible enough to run your ecommerce store with the Buy Now solution.

Example 
'[easybuynow name="Ntekg Coffee Mug" amount="12.50"]'

Some features,

* Add Buy Now buttons anywhere with shortcode.
* Add multiple Buy Now buttons on any page or post.
* Set a dollar amount for price.
* Set a name for your product.
* Set item quantity or allow use to select quantity.
* Set a per item shipping cost.
* Set a 2nd shipping amount for each additional unit.
* Set a fixed tax amount or tax rate.
* Set a SKU or item number.
* Supports PayPal supported currency codes.
* Supports PayPal country codes.
* Supports PayPal test mode (Sandbox).
* Supports window target (current or new).
* Supports PayPal account based shipping calculations.
* Supports PayPal account based shipping using weight in lbs or kgs.
* Supports easy configuration with convenient admin options page.

== Installation ==


1. Unzip the Easy Buy Now Button by Ntekg plugin download.
1. Upload the entire easyNtekgBuyNowButton folder to your wp-content/plugins/ directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

1. Go to Settings>>Easy Buy Now Button by Ntekg.
1. Configure the Easy Buy Now Button by Ntekg options, i.e. PayPal seller's email address, currency, country code, etc.

1. Click the "Update Settings" button.
1. Insert Easy Buy Now Button by Ntekg shortcodes in any post or page.
1. That's it! You're all ready to start making money with Buy Now button!!

== Frequently Asked Questions ==

Will the Easy Buy Now Button by Ntekg create other buttons types, like, Add to Cart, View Cart, Donations, etc?

The Easy Buy Now Button by Ntekg only supports Buy Now buttons. However, Donate button is up for inclusion in future updates.

How many buttons can I place in a post or page?

This is unlimited. You may place as many buttons as you would like in a post or page.

Where can I get technical support?

You can get support through the WordPress community. You can also visit our documentation page.

Where can I find the Easy Buy Now Button by Ntekg documentation page?

You can find the Easy Buy Now Button by Ntekg Documentation here. http://easy-paypal-buy-now-button.ntekg.com

== Changelog ==

= 3.0.2 =
* Tested on WordPress 4.7

= 3.0.1 =
* Minor change. Download button with incorrect version number

= 3.0 =
* Improved functionality

You can now set sales tax and shipping as site-wide attributes.
You no longer need to add these attributes to each shortcode, saving time and potential typos.

= 1.0 =
* First release of the plugin

== Upgrade Notice ==
* Yes. Tested on WordPress version 4.6.1

== Screenshots ==
* None

== Documentation ==

**Basic Usage**

Usage is simple. Create a new post or page add your content to it. Wherever you want a PayPal button to appear include a shortcode like the following example. When you view your published post or page the shortcode will be automatically replaced with a corresponding PayPal button.

*Shortcode Example*

[easybuynow name="Ntekg Coffee Cup" amount="12.50"]

*Shortcode Syntax*

[easybuynow attribute_name="attribute_value"]

**Shortcode Attributes**

The Easy Buy Now Button by Ntekg plugin provides a number of options through the inclusion of 10 shortcode attributes. These attributes are as follows.

* amount
* name
* sku
* shipping
* shipping2
* tax
* tax_rate
* weight
* quantity
* undefined_quantity

Each attribute can be set in the shortcode by including the attribute name followed by an equals sign and the attribute value in quotes.

**Site Wide Attributes**

Set 1 or all of the following attributes on the setting page. Save time and avoid typos when placing shortcode.

* shipping 
* shipping2
* tax
* tax_rate
* quantity
* undefined_quantity
 
*Attribute Example*

[easybuynow name="Ntekg Coffee Cup" amount="12.50" shipping="4.95"]

Define shipping on setting page and use the code like this:

[easybuynow name="Ntekg Coffee Cup" amount="12.50"]

Override any site-wide attribute by adding it to the shortcode:

[easybuynow name="Ntekg WordPress BookCase" amount="12.50" shipping="39.99"]

**Shortcode Attribute Definitions**

*name*

[easybuynow name="Item Name"]

The name of the item being sold. If omitted, payers enter their own name at the time of payment.

*amount*

[easybuynow amount="0.00"]


The price or amount of the product, service, or contribution, not including shipping & handling, or tax. If omitted from Buy Now payers enter their own amount during checkout on the PayPal payment page.

*IMPORTANT:* Do not enter a currency symbol, just the numerical amount.

*sku*

[easybuynow sku="000"]

The id number or sku number for your item. A pass-through variable for you to track product or service purchased or the contribution made. The value you specify passed back to you upon payment completion.

*shipping*

Important: Profile-based refers to your Paypal account settings. We can not override your Paypal account shipping setting.

[easybuynow shipping="0.00"]

The cost of shipping this item. If you specify shipping and shipping2 is not defined, this flat amount is charged regardless of the quantity of items purchased.

Default – If profile-based shipping rates are configured, buyers are charged an amount according to the shipping methods they choose.

Note: If you are going to use profile-based shipping, don't include shipping or shipping2 attributes in shortcode.

*shipping2*

[easybuynow shipping2="0.00"]

The cost of shipping each additional unit of this item. If omitted and profile-based shipping rates are configured, buyers are charged an amount according to the shipping methods they choose.

*tax*

Important: Profile-based refers to your Paypal account settings. This will override your Paypal account tax setting.

[easybuynow tax="0.00"]

Transaction-based tax override variable. Set this to a flat tax amount to the transaction regardless of the buyer’s location. This value overrides any tax settings set in your account profile.

Default – PayPal profile tax settings, if any, apply.

To use your PayPal account tax settings simply exclude the tax attribute.

*tax_rate*

[easybuynow tax_rate="7.50"]

Transaction-based tax_rate override variable. Set this to a percentage tax to the transaction regardless of the buyer’s location. This value overrides any tax settings set in your account profile.

Default – PayPal profile tax rate settings, if any, apply.

Note: Do not use both rate and tax_rate within one shortcode.

*quantity*

[easybuynow quantity="0"]

The number of items or item quantity included in the purchase. For example, if you wanted to sell 10 golf balls at once, you would set the item quantity to 10.

*undefined_quantity*

[easybuynow undefined_quantity="1"]

Allow customer to specify quantity by setting this code to "1". Only use this attribute to allow customers to enter quantity.

Note: Do not use both quantity and undefined_quantity within one shortcode. (Avoid this potential conflict by using site-wide quantity setting)

*weight*

[easybuynow weight="0.0"]

The weight of the item. If PayPal account based shipping rates are configured with a basis of weight, the sum of weight values is used to calculate the shipping charges for the transaction. To enable PayPal account based shipping exclude the shipping and shipping2 attributes. After which you can optionally specify a item weight by entering a numerical (float) weight value, e.g. 1.5.

You may specify pounds or kilograms by adding a suffix of lbs or kgs to your weight value. If no suffix is provided the units of weight will default to pounds.

*Example*

[easybuynow weight="1.5kgs"]

**Plugin Options**

The Easy Buy Now Button by Ntekg plugin allows you to configure the plugin's global settings. Configuration of the plugin is made quick and easy through the use of it's options page. You can find the options page at Admin>>Settings>>Easy Buy Now Button by Ntekg. The Global settings that are made available to you are as follows.

*PayPal Account Email*

Enter your valid PayPal account email address. Payments will be made to the PayPal account associated with this specified email address.

*PayPal Test Mode Email*

Enter your valid PayPal sandbox test seller email address. Test payments will be made to the sandbox account associated with this specified email address. To use this feature you must have a PayPal developer account.

*PayPal Test Mode*

Select on or off to put all PayPal buttons in and out of test mode. When on is specified all transactions are sent to the PayPal sandbox. To use this feature you must have a PayPal developer account.

*Currency Code*

Valid PayPal 3-letter currency codes: Australian Dollars: AUD, Canadian Dollars: CAD, Euros: EUR, Pounds Sterling: GBP, Yen: JPY, U.S. Dollars: USD, New Zealand Dollar: NZD, Swiss Franc: CHF, Hong Kong Dollar: HKD, Singapore Dollar: SGD, Swedish Krona: SEK, Danish Krone: DKK, Polish Zloty: PLN, Norwegian Krone: NOK, Hungarian Forint: HUF, Czech Koruna: CZK, Israeli Shekel: ILS, Mexican Peso: MXN.

*PayPal Country Code*

Enter your 2 digit country code to set the language used on the PayPal payment page. PayPal uses a two-character country code (ISO 3166). Some examples are United States: US, Great Britain: GB, France: FR, Spain: ES, Netherlands: DL, Poland: PL, German: DE. If you don't know your country code, or you can Google PayPal Country Codes.

*Button Language Code*

PayPal uses a 5 character code to designate the language of its buttons. For example, United States English is designated with en_US. Enter the 5 character code for the desired button language. Other code examples are Great Britain English: en_GB, French: fr_FR, Spanish: es_ES, Dutch: nl_NL, Polish: pl_PL, German: de_DE. If you don't know the code for your desired language, log into PayPal use the button creater and search the resulting HTML code for this https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif. Notice the en_US in the URL, it's the language code for the button.

*Default Button Size*

Select the default button size. You can choose between Small and large.

*New Window Target*

Choose how you want the buyer to be sent to PayPal, either in their current browser window or a new browser window.

*Sales Tax*

Select a default tax amount as a rate or flat tax.

*Shipping Charge*

Let default shipping charges.

*Item Quantity*

Select a fixed quantity to sell or let customer choose quantity to purchase.

*Product Name*

You can set a wite-wide product name. Great for non-profits to accept donations in different set amounts.

*Rate This Plugin*

If you find this plugin useful, please rate it. If you find a bug, please report it. I'd like a chance to fix any bugs before you rate it. 

The code is orginally from Trinitronic's Nice Paypal Button Lite plugin. The nice plugin has not been updated in over 12 months from June 2016. I found it useful for one of my client's project and edited it to include features that were not available in the Lite version. Much of the documentation was taken from the Nice project and modified by Ntekg. Getting the code up to date for inclusion in the WordPress directory required time and effort. I am proud of the finished product but I am certain it can be improved on by the community.

