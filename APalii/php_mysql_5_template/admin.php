<?php 
$str = 'title';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin interface</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<form action="hendler_form.php" method="POST" enctype="multipart/form-data">
			<div class="form-group form-control-lg">
				<label>Data</label>
				<input class="form-control" type="date" name="date">
			</div>
			<div class="form-group form-control-lg">
				<label>Title</label>
				<input class="form-control" type="text" name="title">
			</div>
			<div class="form-group form-control-lg">
				<label>Description</label>
				<textarea class="form-control" type="text" name="description"></textarea>

		
			</div>
			<div class="form-group form-control-lg" ><input type="file" class="btn btn-primary" name="fileToUpload" id="fileToUpload"></div>
	    
			<div class="form-group form-control-lg"><button type="submit" class="btn btn-primary">Send and Save record on the server</button></div>
	  </form>

	</div>
<!-- <h1><?php echo $str; ?></h1> -->

	


	
</body>
</html>

