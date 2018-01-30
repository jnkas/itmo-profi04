<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/mustache.min.js"></script>
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div id="myCalendar">
    <div class="filter">

        <table id="calendar">
            <?php
            foreach ($dates as $week) {
                echo '<tr>';
                foreach ($week as $day) {
                    echo '<td data-date="'.$day.'">'.($day !== '' ? date('d', strtotime($day)) : '').'</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
        <form id="filterEvents">
            <label for="from">С</label>
            <input type="date" id="from" name="from" class="form-control">
            <label for="to">По</label>
            <input type="date" id="to" name="to" class="form-control">
            <button type="submit">Фильтр</button>
        </form>

    </div>
    <div class="clear"></div>

    <div class="clear"></div>
</div>

</body>
</html>