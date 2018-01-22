<?php 
$str = 'site gen';


$template = '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin intf Site Gen lab6 </title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<form action="hendler_form_site_gen.php" method="POST" enctype="multipart/form-data">
			<div class="form-group form-control-lg">
				<label>Select Category</label>
				<select name="category">
					{{#arrCategory}}<option value="{{cat}}">{{cat}}</option>{{/arrCategory}}
				 </select>
				<input style="display:none" class="form-control" type="text" name="category111" >
			</div>
			<div class="form-group form-control-lg">
				<label>Page Name</label>
				<input class="form-control" type="text" name="page_id" required>
			</div>
			<div class="form-group form-control-lg">
				<label>Template Page</label>
				<textarea class="form-control" type="text" name="description" required></textarea>

		
			</div>
			
	    
			<div class="form-group form-control-lg"><button type="submit" class="btn btn-primary">Send and Save Page on server</button></div>
	  </form>

	</div>
<!-- <h1><?php echo $str; ?></h1> -->

	

	
</body>
</html>
';

	$filepath = "config.TXT";
	$inputDataJSON = file_get_contents($filepath);
	$dataArray = json_decode($inputDataJSON, true);
	//var_dump($dataArray["arrCategory"]);

require_once('Mustache/Autoloader.php');
Mustache_Autoloader::register();
$mustacheEngine = new Mustache_Engine;

echo $mustacheEngine -> render($template, $dataArray);

?>