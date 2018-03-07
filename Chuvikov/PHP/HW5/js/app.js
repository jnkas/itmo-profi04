$(function () {

    var date_now = new Date();

    todayEvent(date_now);

    $('.cal_table td').click(function (e) {
        getEvent($(e.target).data('date'));
    });

    $('#feed_list button').click(function () {
        var from_date = $('#first_date').val();
        var to_date = $('#second_date').val();
        var request = $.ajax({
            method: "POST",
            url: "feed.php",
            data: {
                date_from: from_date,
                date_to: to_date
            },
            dataType: "json"
        });

        request.done(function (msg) {

            data = {
                "events": msg
            };
            template = "<div class=\"list\">{{#events}}<h1>Событие: {{event}}</h1><h2>{{title}}</h2><img src={{img}}><p>{{desc}}</p><hr>{{/events}}</div>";
            result = Mustache.render(template, data);
            
            $('#day-calendar').html(result);
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });

    });

    function todayEvent(date) {
        var dd = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();
        var mm = ((date.getMonth() + 1) < 10) ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
        var yyyy = date.getFullYear();
        var dt = dd + '.' + mm + '.' + yyyy;

        var request = $.ajax({
            method: "POST",
            url: "servicer.php",
            data: {
                id: dt
            },
            dataType: "json"
        });

        request.done(function (msg) {
            $('#day-calendar').html(msg);
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);

        });
    }

    function getEvent(dt) {
        var request = $.ajax({
            method: "POST",
            url: "servicer.php",
            data: {
                id: dt
            },
            dataType: "json"
        });

        request.done(function (msg) {
            $('#day-calendar').html(msg);
        });
        request.fail(function (jqXHR, textStatus) {
            alert('Request failed: ' + textStatus);
        });
    };
});
