<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/public/js/Treant.js"></script>
    <script src="/public/js/raphael.js"></script>
    <link rel="stylesheet" href="/public/css/Treant.css">
    <link rel="stylesheet" href="/public/css/custom-colored.css">
</head>
<body>
<div class="chart" id="tree-structure" ></div>
<script>
    <?php echo $config ?>

    new Treant(chart_config)
</script>
</body>
</html>