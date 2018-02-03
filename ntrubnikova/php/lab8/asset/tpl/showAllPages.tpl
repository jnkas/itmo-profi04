<html>
<head>
   <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="asset/css/styles.css">
</head>
 <body>
<h1>CMS - Управление страницами</h1>
<form method="post" action="/add"><button>Создать страницу</button></form>
<?php 
$html = '<table><tr><th>ID</th><th>Заголовок страницы</th><th>Содержание страницы</th><th>Открыть</th><th>Редактировать</th><th>Удалить</th></tr>';

foreach ($pagesArray as $value) {
            $html .= '<tr><td>'. $value[id]. '</td><td>'. $value[pageHeader]. '</td><td>'. $value[pageContent]. '</td><td><form method="post" action="view"><input type="text" class="hidden" name="id" value="'. $value[id].'"><button>Открыть</button></form></td><td><form method="post" action="edit"><input type="text" class="hidden" name="id" value="'. $value[id].'"><button>Редактировать</button></form></td><td><form method="post" action="delete"><input type="text" class="hidden" name="id" value="'. $value[id].'"><button>Удалить</button></form></td></tr>';
        };
$html .= '</table>';
echo $html;
?>
</body>
</html>
