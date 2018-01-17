$(function () {
    var date_now = new Date();
    var dd = (date_now.getDate() < 10) ? '0' + date_now.getDate() : date_now.getDate();
    var mm = ((date_now.getMonth() + 1) < 10) ? '0' + (date_now.getMonth() + 1) : (date_now.getMonth() + 1);
    var yyyy = date_now.getFullYear();
    var dt = dd + '.' + mm + '.' + yyyy;

    var request = $.ajax({
        method: "POST",
        url: "servicer.php",
        data: {
            id: dt,
            day: dd,
            month: mm
        },
        dataType: "json"
    });

    request.done(function (msg) {
        $('#day-calendar').html(msg);
    });

    request.fail(function (jqXHR, textStatus) {
        alert('Request failed: ' + textStatus);
    });

    
    /*$('#day-calendar td').click(function (e) {
        var dt = $(e.target).attr('data-date');

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

    });*/


});
