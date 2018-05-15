<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h2>Plugin Control panel!</h2>
  <p>Resize the browser window to see the effect.</p>
  <div class="row">
    <div class="col-sm-2">
   <form action=<?php echo $_SERVER['REQUEST_URI']; ?> method="post"> 	
<div class="form-group">
  <label for="sel1">Options:</label>
  <select class="form-control" id="selectopt">
    <option selected>Select</option>
    <option id="activate">Activate</option>
    <option id="deactivate">Deactivate</option>
    <option id="remove">Remove/Delete</option>
  </select>
</div>
<input type="submit">
</form>
    </div>
    <div class="col-sm-8">
    	<?php
if (!empty($_POST)):

print_r($_POST);

endif;
$uri = $_SERVER['REQUEST_URI'];
echo $uri;
//To deactivate an installed plugin, just call:

//deactivate_plugins( '/plugin-folder/plugin-name.php' );

    	//to deactivate multiple plugins at once:

//deactivate_plugins( array( '/first-plugin/first.php', '/second-plugin/second.php' ) );

/*    	function toggle_plugin() {

	// Full path to WordPress from the root
	$wordpress_path = '/full/path/to/wordpress/';

	// Absolute path to plugins dir
	$plugin_path = $wordpress_path.'wp-content/plugins/';

	// Absolute path to your specific plugin
	$my_plugin = $plugin_path.'my_plugin/my_plugin.php';

	// Check to see if plugin is already active
	if(is_plugin_active($my_plugin)) {

		// Deactivate plugin
		// Note that deactivate_plugins() will also take an
		// array of plugin paths as a parameter instead of
		// just a single string.
		deactivate_plugins($my_plugin);
	}
	else {

		// Activate plugin
		activate_plugin($my_plugin);
	}
}*/


?>
  <table class="table">
    <thead>
      <tr>
      	<th><input type="checkbox" value=""></th>
        <th>Plugin</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>      

<?php
//echo $plugins_url = plugins_url();
//secho $dir = plugin_dir_path( __DIR__ );
$all_plugins = get_plugins();
foreach($all_plugins as $key=>$values){

	//echo plugin_basename( $key );

	// check for plugin using plugin name
if ( is_plugin_active( plugin_basename( $key ) ) ) {
?>
<tr class="success leftborder" style="border-left: 4px solid #00a0d2;">
	<td><input type="checkbox" value=""></td>
        <td>Deactivate</td>
        <td><?php echo plugin_basename( $key ); ?>
        </td>
        <td></td>
      </tr>
      <?php }
      else { ?> <tr class="danger">
      	<td><input type="checkbox" value=""></td>
        <td>Activate</td>
        <td><?php echo $key; echo '<pre>'; foreach ($values as $k=>$v) { echo $v.'<br>'; }   //get_plugin_data( $key); ?>
        </td>
        <td></td>
      </tr> <?php } } ?>
    </tbody>
  </table>

<?php
echo '<pre>';
//print_r($all_plugins);
echo '<pre>';
//print_r($all_plugins->nam);
?>    	
    </div>
  </div>
</div>
    
</body>
</html>
