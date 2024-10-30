<?php
/**
 * @package Easy Buy Now Button by Ntekg
 */
/*
Plugin Name: Easy Buy Now Button
Plugin URI: http://easy-paypal-buy-now-button.ntekg.com
Description: Easy Buy Now Button by Ntekg plugin provides you with an easy PayPal payment solution. Simply add a Easy Buy Now Button by Ntekg shortcode to your post or page and a PayPal Buy Now button will be published in place of the shortcode. To change the plugin's settings visit the <a href="./options-general.php?page=easyBuyNow.php" target="_self" >settings page.</a>
Version: 3.0.2
Author: Ntekg
Author URI: http://easy-paypal-buy-now-button.ntekg.com
License: GPLv2 or later
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if (!class_exists("easyNtekgBuyNowButton")) {

  class easyNtekgBuyNowButton {

    var $adminOptionsName = "easyNtekgBuyNowButtonAdminOptions";

    function easyNtekgBuyNowButton() { //constructor

    }

    // Admin Panel page --------------------------------------

    // Returns an array of admin options
    function getAdminOptions() {

      $easyNtekgBuyNowButtonAdminOpts = array(
          'currency_code'    => 'USD',
          'country_code'     => 'US',
          'paypal_testmode'  => 0,
          'button_path'      => 'en_US',
          'default_btnsize'  => '_LG',
          'open_window'      => '_self',
          'paypal_url'       => 'https://www.paypal.com/',
          'paypal_testurl'   => 'https://www.sandbox.paypal.com/',
          'paypal_email'     => '',
          'paypal_testemail' => '',

        'sw_taxmode'		=> 0,
        'sw_name'	    	=> '',
        'sw_weightmode'	      	=> '',
        'sw_shipping'		=> '',
        'sw_shipping2'		=> '',
        'sw_tax_rate'     	=> '',
        'sw_quantity'		=> ''

        );

      $easyNtekgOptions = get_option( $this->adminOptionsName );

      if ( !empty( $easyNtekgOptions ) ) {

          foreach ( $easyNtekgOptions as $k => $v )

              $easyNtekgBuyNowButtonAdminOpts[$k] = $v;

      }

      update_option($this->adminOptionsName, $easyNtekgBuyNowButtonAdminOpts);

      return $easyNtekgBuyNowButtonAdminOpts;

    }

    function init() {

      $this->getAdminOptions();

    }


    //Prints out the admin page
    function printAdminPage() {

      global $wpdb;

      $easyNtekgOptions = $this->getAdminOptions();


      if (isset($_POST['update_easyNtekgBuyNowButtonSettings'])) {

        if (isset($_POST['currency_code'])) {

          $easyNtekgOptions['currency_code'] = $wpdb->escape($_POST['currency_code']);

        }

        if (isset($_POST['country_code'])) {

          $easyNtekgOptions['country_code'] = $wpdb->escape($_POST['country_code']);

        }

        if (isset($_POST['paypal_testmode'])) {

          $easyNtekgOptions['paypal_testmode'] = $wpdb->escape($_POST['paypal_testmode']);

        }

        if (isset($_POST['button_path'])) {

          $easyNtekgOptions['button_path'] = $wpdb->escape($_POST['button_path']);

        }

        if (isset($_POST['default_btnsize'])) {

          $easyNtekgOptions['default_btnsize'] = $wpdb->escape($_POST['default_btnsize']);

        }

        if (isset($_POST['open_window'])) {

          $easyNtekgOptions['open_window'] = $wpdb->escape($_POST['open_window']);

        }

        if (isset($_POST['paypal_url'])) {

          $easyNtekgOptions['paypal_url'] = $wpdb->esc_url($_POST['paypal_url']);

        }

        if (isset($_POST['paypal_testurl'])) {

          $easyNtekgOptions['paypal_testurl'] = $wpdb->esc_url($_POST['paypal_testurl']);

        }

        if (isset($_POST['paypal_email'])) {

          $easyNtekgOptions['paypal_email'] = filter_var($_POST['paypal_email'], FILTER_SANITIZE_EMAIL);

        }

        if (isset($_POST['paypal_testemail'])) {

          $easyNtekgOptions['paypal_testemail'] = filter_var($_POST['paypal_testemail'], FILTER_SANITIZE_EMAIL);
        }

        if (isset($_POST['sw_taxmode'])) {

          $easyNtekgOptions['sw_taxmode'] =  $wpdb->escape($_POST['sw_taxmode']);
        }

        if (isset($_POST['sw_name'])) {

          $easyNtekgOptions['sw_name'] = sanitize_text_field($_POST['sw_name']);
        }

        if (isset($_POST['sw_weightmode'])) {

          $easyNtekgOptions['sw_weightmode'] =  $wpdb->escape($_POST['sw_weightmode']);
        }

        if (isset($_POST['sw_shipping'])) {

	  $easyNtekgOptions['sw_shipping'] = apply_filters( 'abs', $_POST['sw_shipping'] );
	 }

        if (isset($_POST['sw_shipping2'])) {

          $easyNtekgOptions['sw_shipping2'] = apply_filters( 'abs', $_POST['sw_shipping2'] );
        } 

        if (isset($_POST['sw_tax_rate'])) {

          $easyNtekgOptions['sw_tax_rate'] = apply_filters( 'number_format_i18n', ($_POST['sw_tax_rate']) );
        }

        if (isset($_POST['sw_quantity'])) {

          $easyNtekgOptions['sw_quantity'] = apply_filters( 'number_format_i18n', ($_POST['sw_quantity']) );
        }


        update_option($this->adminOptionsName, $easyNtekgOptions);

        ?>



        <div class="updated"><p><strong><?php _e("Settings Updated.", "easyNtekgBuyNowButton");?></strong></p></div>

      <?php

        foreach($easyNtekgOptions as $k => $v)
        {
          $easyNtekgOptions[$k] = esc_html($v);
        }

      } ?>

      <div class=wrap>
<section id="ebn_sw_prod_atts">

        <form name="my_form" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
          <h2>Easy Buy Now Button by Ntekg</h2>
          <h3>PayPal Account Email</h3>
          <p>Enter your valid PayPal account email address.</p>
          <input type="text" size="50" name="paypal_email" id="paypal_email" value="<?php if (is_email($easyNtekgOptions['paypal_email'])) _e(apply_filters('format_to_edit',$easyNtekgOptions['paypal_email'], 'easyNtekgBuyNowButton')); else if ($easyNtekgOptions['paypal_email'] != '') $emailErr="Invalid format";?>" /><span style="color:red;" class="error">* <?php echo $emailErr;?></span><span><?php if ($emailErr=="Invalid format") echo (' '.$_POST['paypal_email']); $emailErr=""?></span>
          <h3>PayPal Test Mode Email</h3>
          <p>Enter your valid PayPal sandbox test seller email address.<br />To use this feature you must have a PayPal developer account.</p>
          <input type="text" size="50" name="paypal_testemail" id="paypal_testemail" value="<?php if (is_email($easyNtekgOptions['paypal_testemail'])) _e(apply_filters('format_to_edit',$easyNtekgOptions['paypal_testemail'], 'easyNtekgBuyNowButton')); else if ($easyNtekgOptions['paypal_testemail'] != '') $emailErr="Invalid format";?>" /><span style="color:red;" class="error">* <?php echo $emailErr;?></span><span><?php if ($emailErr=="Invalid format") echo (' '.$_POST['paypal_testemail']); $emailErr=""?></span>
          <h3>PayPal Test Mode</h3>
          <p>Select on or off to put all PayPal buttons in and out of test mode. When on is specified all transactions are sent to the PayPal sandbox.<br />To use this feature you must have a PayPal developer account.</p>
          <p><label for="paypal_testmode0">
            <input type="radio" id="paypal_testmode0" name="paypal_testmode" value="0" <?php if ($easyNtekgOptions['paypal_testmode'] == 0) { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />off</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="jform_params_paypal_testmode1">
            <input type="radio" id="paypal_testmode1" name="paypal_testmode" value="1" <?php if ($easyNtekgOptions['paypal_testmode'] == 1) { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />on</label>
          </p>
          <h3>Currency Code</h3>
          <p>Valid PayPal 3-letter currency codes: Australian Dollars: AUD, Canadian Dollars: CAD, Euros: EUR, Pounds Sterling: GBP, Yen: JPY, U.S. Dollars: USD, New Zealand Dollar: NZD, Swiss Franc: CHF, Hong Kong Dollar: HKD, Singapore Dollar: SGD, Swedish Krona: SEK, Danish Krone: DKK, Polish Zloty: PLN, Norwegian Krone: NOK, Hungarian Forint: HUF, Czech Koruna: CZK, Israeli Shekel: ILS, Mexican Peso: MXN. If your currency is not on the dropdown list, contact plugin support to have it added.</p>
          <select id="currency_code" name="currency_code">
                   <option value="<?php echo $easyNtekgOptions['currency_code'] ;?>"><?php echo $easyNtekgOptions['currency_code'] ;?></option>
                   <option value="USD">U.S. Dollars</option>
		   <option value="AUD">Australian Dollars</option>
 		   <option value="CAD">Canadian Dollars</option>
 		   <option value="EUR">Euros</option>
 		   <option value="GBP">Pounds Sterling</option>
                   <option value="JPY">Yen</option>
                   <option value="NZD">New Zealand Dollar</option>
                   <option value="CHF">Swiss Franc</option>
                   <option value="HKD">Hong Kong Dollar</option>
                   <option value="SGD">Singapore Dollar</option>
                   <option value="SEK">Swedish Krona</option>
                   <option value="DKK">Danish Krone</option>
                   <option value="PLN">Polish Zloty</option>
                   <option value="NOK">Norwegian Krone</option>
                   <option value="HUF">Hungarian Forint</option>
                   <option value="CZK">Czech Koruna</option>
                   <option value="ILS">Israeli Shekel</option>
                   <option value="MXN">Mexican Peso</option>
  </select> <?php echo 'Set To: '; echo $easyNtekgOptions['currency_code'];?>
          <h3>PayPal Country Code</h3>
          <p>Select your country to set the language used on the PayPal payment page. Paypal uses a 2 character code. Some examples are United States: US, Great Britain: GB, France: FR, Spain: ES, Netherlands: NL, Poland: PL, German: DE. If your country is not on the dropdown, please contact support to have it added.</p>
          <select id="country_code" name="country_code">
                   <option value="<?php echo $easyNtekgOptions['country_code'] ;?>"><?php echo $easyNtekgOptions['country_code'] ;?></option>
                   <option value="US">United States</option>
		   <option value="GB">Great Britain</option>
 		   <option value="FR">France</option>
 		   <option value="ES">Spain</option>
 		   <option value="DL">Netherlands</option>
                   <option value="PL">Poland</option>
                   <option value="DE">German</option>
          </select> <?php echo 'Set To: '; echo $easyNtekgOptions['country_code'];?>
          <h3>Button Language Code</h3>
          <p>Select your desired button language. PayPal uses a 5 character code to designate the language of its buttons. For example, select United States English:en_US to designate the button language. Other examples are Great Britain English:en_GB, French:fr_FR, Spanish:es_ES, German:de_DE. If you don't see your desired language, contact support to have it added.</p>
          <select id="button_path" name="button_path">
                   <option value="<?php echo $easyNtekgOptions['button_path'] ;?>"><?php echo $easyNtekgOptions['button_path'] ;?></option>
                   <option value="en_US">United States English</option>
		   <option value="en_GB">Great Britain English</option>
 		   <option value="fr_FR">French</option>
 		   <option value="es_ES">Spanish</option>
                   <option value="de_DE">German</option>
  </select> <?php echo 'Set To: '; echo $easyNtekgOptions['button_path'];?>
          <h3>Default Button Size</h3>
          <p>Select the default button size. You can choose between Small or Large.</p>
          <p><label for="default_btnsize_SM">
            <input type="radio" id="default_btnsize_SM" name="default_btnsize" value="_SM" <?php if ($easyNtekgOptions['default_btnsize'] == "_SM") { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />Small</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="default_btnsize_LG">
            <input type="radio" id="default_btnsize_LG" name="default_btnsize" value="_LG" <?php if ($easyNtekgOptions['default_btnsize'] == "_LG") { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />Large</label>
          </p>
          <h3>New Window Target</h3>
          <p>Choose how you want the buyer to be sent to PayPal, either in their current browser window or a new browser window.</p>
          <p><label for="open_window_self">
            <input type="radio" id="open_window_self" name="open_window" value="_self" <?php if ($easyNtekgOptions['open_window'] == "_self") { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />Current window</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="open_window_blank">
            <input type="radio" id="open_window_blank" name="open_window" value="_blank" <?php if ($easyNtekgOptions['open_window'] == "_blank") { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />New window</label>
          </p>

	  <h2>Site Wide Product Attributes</h2>
	  <p>These attributes can be set here and/or using short code.<br>
	  Common attributes that are the same site-wide:<ul>
		<li>Sales Tax</li>
		<li>Shipping Charges</li>
		<li>Quantity</li>
		</ul></p>
          <h3>Sales Tax</h3>
          <p>Percentage sales tax are most common.</p>
	   <label for="tax_mode0">
            <input type="radio" id="tax_mode" name="sw_taxmode" value="0" <?php if ($easyNtekgOptions['sw_taxmode'] == 0) { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />%</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <label for="tax_mode1">
            <input type="radio" id="tax_mode1" name="sw_taxmode" value="1" <?php if ($easyNtekgOptions['sw_taxmode'] == 1) { _e('checked="checked"', "easyNtekgBuyNowButton"); }?> />Flat</label>&nbsp;&nbsp;&nbsp;&nbsp;
          
          <input type="text" size="6" name="sw_tax_rate" id="sw_tax_rate" value="<?php if (is_numeric($easyNtekgOptions['sw_tax_rate'])) {$easyNtekgOptions['sw_tax_rate']=abs($easyNtekgOptions['sw_tax_rate']); _e(apply_filters('format_to_edit',$easyNtekgOptions['sw_tax_rate'], 'easyNtekgBuyNowButton'));} else if ($easyNtekgOptions['sw_tax_rate'] != '') $emailErr="Enter a number";?>" /><span style="color:red;" class="error"><?php echo $emailErr;?><?php if ($emailErr=="Enter a number") echo ('  ' . ' '.$_POST['sw_tax_rate']); $emailErr=""?></span>
</p>



          <h3>Shipping Charge Per Item</h3>
          <p>Amount to ship first item on order.<br>For example, $5.09 to ship 1 book, enter 5.09</p>
          <input type="text" size="6" name="sw_shipping" id="sw_shipping" value="<?php if (is_numeric($easyNtekgOptions['sw_shipping'])) {$easyNtekgOptions['sw_shipping']=abs($easyNtekgOptions['sw_shipping']); _e(apply_filters('format_to_edit',$easyNtekgOptions['sw_shipping'], 'easyNtekgBuyNowButton'));} else if ($easyNtekgOptions['sw_shipping'] != '') $emailErr="Enter a number";?>" /><span style="color:red;" class="error"><?php echo $emailErr;?><?php if ($emailErr=="Enter a number") echo ('  ' . ' '.$_POST['sw_shipping']); $emailErr=""?></span>
</p>
          <p>Amount to ship additional items.<br>Cost per item, i.e. 59 cents more per book, enter .59</p>
          <input type="text" size="6" name="sw_shipping2" id="sw_shipping2" value="<?php if (is_numeric($easyNtekgOptions['sw_shipping2'])) {$easyNtekgOptions['sw_shipping2']=abs($easyNtekgOptions['sw_shipping2']); _e(apply_filters('format_to_edit',$easyNtekgOptions['sw_shipping2'], 'easyNtekgBuyNowButton'));} else if ($easyNtekgOptions['sw_shipping2'] != '') $emailErr="Enter a number";?>" /><span style="color:red;" class="error"><?php echo $emailErr;?><?php if ($emailErr=="Enter a number") echo ('  ' . ' '.$_POST['sw_shipping2']); $emailErr=""?></span>
</p>

          <h3>Item Quantity</h3>
          <p>Common to allow customer to change quantity.<br>Leave blank or enter quantity customer must purchase.</p>
          <input type="text" size="6" name="sw_quantity" id="sw_quantity" value="<?php if (is_numeric($easyNtekgOptions['sw_quantity'])) {$easyNtekgOptions['sw_quantity']=abs(intval($easyNtekgOptions['sw_quantity'])); _e(apply_filters('format_to_edit',$easyNtekgOptions['sw_quantity'], 'easyNtekgBuyNowButton'));} else if ($easyNtekgOptions['sw_quantity'] != '') $emailErr="Enter a number";?>" /><span style="color:red;" class="error"><?php echo $emailErr;?><?php if ($emailErr=="Enter a number") echo ('  ' . ' '.$_POST['sw_quantity']); $emailErr=""?></span>
</p>

          <h3>Product Name</h3>
          <p>In the unlikely event, your store sells the same item at different prices, set the product name here. For example, 'Donate' as product name for all items, set different amounts with short code. For most, leave blank.</p>
          <input type="text" size="25" name="sw_name" id="sw_name" value="<?php echo $easyNtekgOptions['sw_name']; ?>"
	  <br><?php echo 'Set To: '; echo $easyNtekgOptions['sw_name'];?></p>

</section>

          <div class="submit">
          <input type="submit" name="update_easyNtekgBuyNowButtonSettings" value="<?php _e('Update Settings', 'easyNtekgBuyNowButton') ?>" /></div>
        </form>
      </div>

    <?php
    }//End function printAdminPage()


    // -------------------------------------- End Admin Panel page


    // Plugin functionality --------------------------------------

    function geteasyNtekgBuyNowButton ( $atts = '' ){

      extract( shortcode_atts(

      array(

        'amount'		=> '',
        'name'	    		=> '',
        'sku'	      		=> '',
        'shipping'		=> '',
        'shipping2'		=> '',
        'tax'	      		=> '',
        'tax_rate'     		=> '',
        'quantity'		=> '',
        'undefined_quantity'	=> '',
        'weight'		=> ''

      ), $atts ));

      $opts = $this->getAdminOptions();

      $atts['currency_code']    = $opts['currency_code'];
      $atts['country_code']     = $opts['country_code'];
      $atts['paypal_testmode']  = $opts['paypal_testmode'];
      $atts['button_path']      = $opts['button_path'];
      $atts['default_btnsize']  = $opts['default_btnsize'];
      $atts['open_window']      = $opts['open_window'];
      $atts['paypal_email']     = $opts['paypal_email'];
      $atts['paypal_testemail'] = $opts['paypal_testemail'];
      $atts['paypal_url']       = 'https://www.paypal.com/';
      $atts['paypal_testurl']   = 'https://www.sandbox.paypal.com/';
      $atts['command']          = '_xclick';
      $atts['url']              = $atts['paypal_testmode'] ? $atts['paypal_testurl']   : $atts['paypal_url'];
      $atts['email']            = $atts['paypal_testmode'] ? $atts['paypal_testemail'] : $atts['paypal_email'];
      $atts['button_image']     = $atts['url'].$atts['button_path'].'/i/btn/btn_buynow'.$atts['default_btnsize'].'.gif';
      $atts['sw_name']		= $opts['sw_name'];
      $atts['sw_weightmode']		= $opts['sw_weightmode'];
      $atts['sw_shipping']	= $opts['sw_shipping'];
      $atts['sw_shipping2']	= $opts['sw_shipping2'];
      $atts['sw_tax_rate']	= $opts['sw_tax_rate'];
      $atts['sw_quantity']	= $opts['sw_quantity'];
      $atts['sw_taxmode']	= $opts['sw_taxmode'];


      foreach($atts as $k => $v)
      {
        $atts[$k] = esc_html($v);
      }

      $insert = $this->easyNtekgBuyNowButtonBuildForm( $atts );

      return $insert;

    }

    function easyNtekgBuyNowButtonBuildForm( $a )
    {

      $f = '';

      if ( $a['command'] != '' && $a['email'] != '' && $a['url'] != '' ){

        $f .= '<form class="easyNtekgBuyNowButton" action="'.$a['url'].'/cgi-bin/webscr" method="post" target="'.$a['open_window'].'">';
        $f .= '<input type="hidden" name="business" value="'.$a['email'].'" />';
        $f .= '<input type="hidden" name="cmd" value="'.$a['command'].'" />';

	//item name
	if ( $a['name'] != '') {
	   $f .= '<input type="hidden" name="item_name" value="'.$a['name'].'" />';
	}
	else {
	   $f .= '<input type="hidden" name="item_name" value="'.$a['sw_name'].'" />';

	}

	//amount
        $f .= '<input type="hidden" name="amount" value="'.$a['amount'].'" />';


        //item number
        if ( $a['sku'] != '' ){

          $f .= '<input type="hidden" name="item_number" value="'.$a['sku'].'" />';

        }

        //shipping
        if ( $a['shipping'] != '' ){

          $f .= '<input type="hidden" name="shipping" value="'.$a['shipping'].'" />';
	}
	else {
	   $f .= '<input type="hidden" name="shipping" value="'.$a['sw_shipping'].'" />';

	}


        //shipping2
        if ( $a['shipping2'] != '' ){

          $f .= '<input type="hidden" name="shipping2" value="'.$a['shipping2'].'" />';
	}
	else {
	   $f .= '<input type="hidden" name="shipping2" value="'.$a['sw_shipping2'].'" />';

	}


        //tax
        if ( $a['tax'] != ''){

          $f .= '<input type="hidden" name="tax" value="'.$a['tax'].'" />';
	}
	else { if ($a['sw_tax_rate'] != '' && $a['sw_taxmode'] == 1 )
	   $f .= '<input type="hidden" name="tax" value="'.$a['sw_tax_rate'].'" />';

	}


        //tax rate added
        if ( $a['tax_rate'] != ''){

          $f .= '<input type="hidden" name="tax_rate" value="'.$a['tax_rate'].'" />';
	}
	else { if ($a['sw_tax_rate'] != '' && $a['sw_taxmode'] == 0 )
	   $f .= '<input type="hidden" name="tax_rate" value="'.$a['sw_tax_rate'].'" />';

	}

        //undefined_quantity added
        if ( $a['undefined_quantity'] != '' ){

        $f .= '<input type="hidden" name="undefined_quantity" value="'.$a['undefined_quantity'].'" />';

        } else {
	if ($a['sw_quantity'] == '' ) {

        $f .= '<input type="hidden" name="undefined_quantity" value="'.'1'.'" />';

		}
	}


        //quantity
        if ( $a['quantity'] != '' ){

        $f .= '<input type="hidden" name="quantity" value="'.$a['quantity'].'" />';

        } else {
	if ($a['sw_quantity'] != '' ) {

        $f .= '<input type="hidden" name="quantity" value="'.$a['sw_quantity'].'" />';

		}
	}

        //weight
        if ( $a['weight'] != '' ){

         $a['weight'] = strtolower( $a['weight'] );
         $a['weight'] = str_replace( ' ', '', $a['weight'] );

         if ( preg_match_all('/lbs/', $a['weight'], $op) || preg_match_all('/kgs/', $a['weight'], $op) ) {

           $wu  = substr( $a['weight'], -3);
           $w   = substr( $a['weight'], 0, -3);

         }else {

           $wu  = 'lbs';
           $w   = $a['weight'];

         }

          $f .= '<input type="hidden" name="weight" value="'.$w.'" />';
          $f .=	'<input type="hidden" name="weight_unit" value="'.$wu.'" />';

        }

        $f .= '<input type="hidden" name="currency_code" value="'.$a['currency_code'].'" />';
        $f .= '<input type="hidden" name="lc" value="'.$a['country_code'].'" />';
        $f .= '<input type="image" name="submit" style="border: 0;" src="'.$a['button_image'].'" alt="PayPal - The safer, easier way to pay online" />';
        $f .= '</form>';

      }else {

        $f .= '<div style="color: red;" >ERROR: Incomplete Easy Buy Now Button by Ntekg data!<br />OWNER: Update <a href="../wp-admin/options-general.php?page=easyBuyNow.php" target="_self" >settings page.</a> Enter valid email.</div>';

      }

      return $f;

    }

  }

} //End Class easyBuyNowButton

if (class_exists("easyNtekgBuyNowButton")) {
    $easyNtekg_buynowButton = new easyNtekgBuyNowButton();
}

//Initialize the admin panel
if ( !function_exists("easyNtekgBuyNowButton_ap") ) {

    function easyNtekgBuyNowButton_ap() {

        global $easyNtekg_buynowButton;

        if ( !isset($easyNtekg_buynowButton) ) {

          return;

        }

        if ( function_exists('add_options_page') ) {

          add_options_page('Easy Buy Now Button by Ntekg', 'Easy Buy Now Button by Ntekg', 9, basename(__FILE__), array(&$easyNtekg_buynowButton, 'printAdminPage'));

        }
    }
}

//Styling for option page
function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/easyBuyNowOptPageStyle.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'admin_register_head');

//Actions and Filters
if (isset($easyNtekg_buynowButton)) {

    // Init admin panel
    add_action('admin_menu', 'easyNtekgBuyNowButton_ap');

    // Retrieve admin options
    add_action('activate_easyNtekgBuyNowButton/easyNtekgBuyNowButton.php',  array(&$easyNtekg_buynowButton, 'init'));

    // Adds shortcode
    add_shortcode('easybuynow', array(&$easyNtekg_buynowButton, 'geteasyNtekgBuyNowButton'), 1);

    //Enable shortcode replacement in text widgets
    add_filter( 'widget_text', 'shortcode_unautop');
    add_filter( 'widget_text', 'do_shortcode', 11);
}

?>