<?php

$open = fopen("tmpl/2.txt","r");
$dt = date("d.m.Y" ,strtotime($_POST['date']));
$result = true;
while (($line = fgetcsv($open,0,";"))!== FALSE){
	if ($dt == $line[0]){
		$result = false;
		break;
	} 
}
fclose($open);
if ($result){
	$file = fopen("tmpl/2.txt","a");
	$description = str_replace("\n", " ", $_POST['description']);
	$str = PHP_EOL.'"'. date("d.m.Y" ,strtotime($_POST['date'])) . '";"' . $_POST['title'] . '";"' . $description.'"';
	fwrite($file, $str);

	$target_dir = "img/";
	$target_file = $target_dir .date("d.m.Y" ,strtotime($_POST['date'])).".jpg";//basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	echo 'Record has been created';
}
else {
	echo 'File already have a record on this date';

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Server</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<form action="hendler_form.php" method="POST">

			<button type="submit" formaction="http://localhost/php/admin.php" class="btn btn-primary">Return to the Admin page</button>
	  </form>
	</div>
	
</body>
</html>

