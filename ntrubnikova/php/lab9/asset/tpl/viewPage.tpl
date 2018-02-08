<html>
<head>
   <title><?php echo $pageHeader; ?></title>
    <link rel="stylesheet" href="asset/css/styles.css">
</head>
 <body>
  <h1 class="page-header"><?php echo $pageHeader; ?></h1>
  <form method="post" action="/logout" id="logout"><button>Выйти</button></form>
  <div class="page-content">
      <p><?php echo $pageContent; ?></p>
  </div>
 </body>
</html>