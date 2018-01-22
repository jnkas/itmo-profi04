<?php
include 'includes/rus2translit.php';

//echo "content/".rus2translit($_POST['id']);
echo file_get_contents("content/".rus2translit($_POST['id']).".txt");
?>
