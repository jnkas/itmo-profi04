<?php 
$str = 'site gen';
?>

<!DOCTYPE html>
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
				<label>Category</label>
				<input class="form-control" type="text" name="category" required>
			</div>
			<div class="form-group form-control-lg">
				<label>Page Name</label>
				<input class="form-control" type="text" name="page_id" required>
			</div>
			<div class="form-group form-control-lg">
				<label>Template Page</label>
				<textarea class="form-control" type="text" name="description" required></textarea>

		
			</div>
			
	    
			<div class="form-group form-control-lg"><button type="submit" class="btn btn-primary">Send and Save Page on the server</button></div>
	  </form>

	</div>
<!-- <h1><?php echo $str; ?></h1> -->

	


	
</body>
</html>



<h1><?php echo $str; ?></h1> 