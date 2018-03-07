document.getElementById("searchButton").onclick = function(event) {

    var section = "{{#listOfEvents}}<div id=\"day-calender\">" +
        "<h1>{{dateEvent}}</h1>" +
        "<h3>{{header}}</h3>" +
        "<img src='./img/{{dateEvent}}.jpg'>" +
        "<p>{{content}}</p>" +
        "</div>{{/listOfEvents}}";

    var firstDate = document.getElementById("inpFirstDateFilter").value;
    var secondDate = document.getElementById("inpSecondDateFilter").value;
    var request = $.ajax({
        cache: false,
        url: "handler_filter.php",
        method: "POST",
        data: {idFirstDate: firstDate, idSecondDate: secondDate},
        dataType: "json"
    });

    request.done(function (obj) {
        console.log("done " + obj);
        $("#eventRibbon").html(Mustache.to_html(section, obj));
    });

    request.fail(function (obj) {
        console.log("fail");
        console.log(obj);
        $("#eventRibbon").html(obj);
    });
};
