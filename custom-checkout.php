<?php
/*
Template Name: Custom Checkout
*/
wp_head();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Multistep checkout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Checkout</h2>
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" id="tab_login" href="#login">Login</a></li>
    <li><a data-toggle="tab" id="tab_coupon" href="#coupon">Coupon</a></li>
    <li><a data-toggle="tab" id="tab_billing_shipping" href="#billingshipping">Billing & Shipping</a></li>
    <li><a data-toggle="tab" id="tab_order_payment" href="#orderpayment">Order & Payment</a></li>
  </ul>

  <div class="tab-content">
    
    <div id="login" class="tab-pane fade in active">
      <?php get_template_part( 'partials/navigation', 'login' ); ?>
      <?php //get_template_part( 'template-parts/navigation/navigation', 'login' ); ?>
    </div>

    <div id="coupon" class="tab-pane fade">
    <?php get_template_part( 'partials/navigation', 'coupon' ); ?>
    </div>

    <div id="billingshipping" class="tab-pane fade">
      <?php get_template_part( 'partials/navigation', 'billingshipping' ); ?>
    </div>

    <div id="orderpayment" class="tab-pane fade">
 <?php get_template_part( 'partials/navigation', 'orderpayment' ); ?>
    </div>

  </div>



<div class="row">
    <div class="col-md-12">
        <?php //echo do_shortcode('[products limit="4" columns="2" visibility="featured"]'); ?>
    </div>
</div>

<div id="map"></div>

</div>

</body>
</html>
