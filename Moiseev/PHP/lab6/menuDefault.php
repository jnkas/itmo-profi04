 <?php include "../configuration.php"?>
<ul class="mainMenu">
    <li><a href="../index.php">Main page</a></li>
    <li><a href="../admin/index.php">Admin page</a></li>
    <? foreach ($arrCategory as $keyDir => $valueDir): ?>
        <?php $arrTempListFiles = scandir("../".$keyDir); ?>
        <li><a><?=$valueDir?></a>
        <ul class="submenu">
            <? foreach ($arrTempListFiles as $valueFile): ?>
                <? if ($valueFile != "." && $valueFile != ".."): ?>
                    <li><a href="<?="../".$keyDir."/".$valueFile?>"><?=$valueFile?></a></li>
                <? endif; ?>
            <? endforeach; ?>
        </ul>
        </li>
    <? endforeach; ?>
</ul>