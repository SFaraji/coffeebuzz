<form action="https://secure.paypal.com/uk/cgi-bin/webscr" method="post" name="paypal" id="paypal">
    <!-- Prepopulate the PayPal checkout page with customer details, -->

    <input name="first_name" value="">
    <input name="email" value="">
    <input name="address1" value="">
    <input name="address2" value="">
    <input name="city" value="">
    <input name="zip" value="">
    <input name="day_phone_a" value="">
    <input name="day_phone_b" value="">

    <!-- We don't need to use _ext-enter anymore to prepopulate pages -->
    <!-- cmd = _xclick will automatically pre populate pages -->
    <!-- More information: https://www.x.com/docs/DOC-1332 -->
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="business" value="stevenkorevaar@bigpond.com" />
    <input type="hidden" name="cbt" value="Return to Your Business Name" />
    <input type="hidden" name="currency_code" value="GBP" />

    <!-- Allow the customer to enter the desired quantity -->
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="item_name" value="Name of Item" />

    <!-- Custom value you want to send and process back in the IPN -->
    <input type="hidden" name="custom" value="<?php echo session_id()?>" />

    <input type="hidden" name="shipping" value="<?php echo $shipping_price; ?>" />
    <input type="hidden" name="invoice" value="<?php echo $invoice_id ?>" />
    <input type="hidden" name="amount" value="<?php echo $total_order_price; ?>" />
    <input type="hidden" name="return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/thankyou"/>
    <input type="hidden" name="cancel_return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/cancelled" />

    <!-- Where to send the PayPal IPN to. -->
    <input type="hidden" name="notify_url" value="http://<?php echo $_SERVER['SERVER_NAME']?>/shop/paypal/process" />
  </form>