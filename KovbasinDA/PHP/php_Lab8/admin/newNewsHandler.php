<?php
$currContentFileNews = file_get_contents("../newsDB/news.txt");
if ($currContentFileNews) {
    $currContentFileNews = $currContentFileNews."\n";
}
$fDB = fopen("../newsDB/news.txt", "w+");
fwrite($fDB, $currContentFileNews.$_POST[nameHeadNews].";".$_POST[nameNewsContent]);


fclose($fDB);


header("Location:adminNewNews.php");