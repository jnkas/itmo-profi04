<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php_Lab6</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>
        <?php include "configuration.php"?>
        <ul>
            <li><a href="admin/index.php">Admin page.</a></li>
        </ul>
        <ul class="mainMenu">
            <? foreach ($arrCategory as $keyDir => $valueDir): ?>
                <?php $arrTempListFiles = scandir($keyDir); ?>
                <li><p><?=$valueDir?></p></li><ul class="submenu">
                    <? foreach ($arrTempListFiles as $valueFile): ?>
                        <? if ($valueFile != "." && $valueFile != ".."): ?>
                            <li><a href="<?="../".$keyDir."/".$valueFile?>"><?=$valueFile?></a></li>
                        <? endif; ?>
                    <? endforeach; ?>
                </ul>
            <? endforeach; ?>
        </ul>
    </div>
</body>
</html>