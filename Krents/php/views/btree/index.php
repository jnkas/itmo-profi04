<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/js/Treant.js"></script>
    <script src="/js/raphael.js"></script>
    <link rel="stylesheet" href="/css/Treant.css">
    <link rel="stylesheet" href="/css/custom-colored.css">
</head>
<body>
<div class="chart" id="tree-structure" ></div>
<script>
    <?php echo $config ?>

    new Treant(chart_config)
</script>
</body>
</html>