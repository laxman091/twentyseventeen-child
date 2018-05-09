<?php
//mkdir("testing");

 ?>
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
  <h2>Theme Control panel!</h2>
  
  <div class="row">
    <div class="col-sm-2">
    	
<div class="form-group">
  <label for="sel1">Options:</label>
  <select class="form-control" id="selectopt">
    <option selected>Select</option>
    <option id="activate">Activate</option>
    <option id="deactivate">Create</option>
    <option id="remove">Remove</option>
  </select>
</div>

    </div>
    <div class="col-sm-8">
    	
<?php
$themes = wp_get_themes();

foreach($themes as $key=>$value){
echo $value->name . '<br>';
}





 ?>


    </div>
  </div>
</div>
    
</body>
</html>
