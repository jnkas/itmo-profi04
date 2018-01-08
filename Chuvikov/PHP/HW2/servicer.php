<?php
$file = file_get_contents('tplt/'. $_POST['id'] .'.txt',FILE_USE_INCLUDE_PATH);
$arr = explode(";",$file);

$exit = "<table>
        <tr><td><h1>$arr[0]</h1></td><td><h3>$arr[1]</h3></td></tr>
        <tr><td><img src='img/$_POST[id].jpg'></td><td>$arr[2]</td></tr>
        </table>";
        
echo $exit;

?>