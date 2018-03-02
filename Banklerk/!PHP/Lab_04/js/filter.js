document.getElementById("searchButton").onclick = function(event) {

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
        console.log("done" + obj);
        $("#eventRibbon").html(obj);
    });

    request.fail(function (obj) {
        console.log("fail");
        console.log(obj);
        $("#eventRibbon").html(obj);
    });
};
