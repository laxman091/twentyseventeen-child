      <h3>Billing & Shipping</h3>
      <?php //echo get_stylesheet_directory_uri(); ?>
      <?php //get_template_part( 'woocommerce/checkout/form', 'checkout' ); ?>
      <?php //echo do_shortcode('[woocommerce_one_page_checkout]'); ?>
      <?php //do_action('woocommerce_checkout_process'); ?>
      <div class="row">
    <div class="col-sm-6">
<div class="checkbox">
  <label><input type="checkbox" value="" class="chk_shipping">Shipping address same as billing info below</label>
</div>

<form id="custom_billing_form">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="first_name" type="text" class="form-control" name="first_name" placeholder="First name">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="last_name" type="text" class="form-control" name="last_name" placeholder="Last name">
  </div>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="user_address" type="text" class="form-control" name="user_address" placeholder="Address">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <!--input id="user_country" type="text" class="form-control" name="user_country" placeholder="Country"-->
<?php
    global $woocommerce;
    $countries_obj   = new WC_Countries();
    $countries   = $countries_obj->__get('countries');
    echo '<div id="my_custom_countries_field country_field"><!--h2>' . __('Countries') . '</h2-->';

    woocommerce_form_field('my_country_field', array(
    'type'       => 'select',
    'class'      => array( 'chzn-drop' ),
    'label'      => __('Select a country'),
    'placeholder'    => __('Enter something'),
    'options'    => $countries
    )
    );
    echo '</div>';
    ?>
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="input-group">
    <span class="input-group-addon">Message</span>
    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
  </div>
     <div class="input-group">
    <?php wp_nonce_field(); ?>
  </div>
    <div class="form-group">
      <button type="button" class="btn btn-danger btn_customer_details">Save</button>
  </div>

</form>
</div>
<div class="col-sm-6">
  google map
  </div>
</div>

<div class="row">
  <div class="col-sm-2"><button type="button" class="btn btn-primary previous_billing_shipping">Previous</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-primary next_order_payment">Next</button></div>
</div>