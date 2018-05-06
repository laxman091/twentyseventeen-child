<?php
$args = array(
	'echo'           => true,
	'remember'       => true,
	'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['REQUEST_URI'],	// $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	'form_id'        => 'loginform',
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'label_username' => __( 'Username or Email Address' ),
	'label_password' => __( 'Password' ),
	'label_remember' => __( 'Remember Me' ),
	'label_log_in'   => __( 'Log In' ),
	'value_username' => '',
	'value_remember' => false
);
//echo  $_SERVER['REQUEST_URI'];

if ( is_user_logged_in() ) :
	$current_user = wp_get_current_user();
	echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';

	// If user is not logged in.
                else:

?>


<h3>Login Form</h3>
<?php
//echo $current_url = home_url(add_query_arg(array(),$wp->request)); ?>
      <?php //echo get_stylesheet_directory_uri() . '/assets/js/global.js'; ?>
      <!--img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sandwich.jpg" alt="" width="100px" height="100px" /-->
      <p><?php wp_login_form($args); ?></p>
      <?php
endif;
?>
      <div class="row">
  <div class="col-sm-2"><button type="button" class="btn btn-primary" disabled>Previous</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-primary next_coupon">Next</button></div>
</div>

