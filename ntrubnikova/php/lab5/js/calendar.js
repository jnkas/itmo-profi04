//Transform input date to dd.mm.yyyy format
function transformDateFormat(input){
    var inputDate = new Date(input);
    var day = inputDate.getDate();
    var month = inputDate.getMonth();
    month = month + 1;
        if ((String(day)).length == 1)
            {day = '0' + day;}
        if ((String(month)).length == 1)
            {month = '0' + month;}
        myDate = day + '.' + month + '.' + inputDate.getFullYear();
        return myDate;
};

//Draw the calendar
$("#set-date").click(function(){
    
    var month = document.getElementById("choose-month").value;
    var year = document.getElementById("choose-year").value;
    
    if (month !== "00" && year !== "00") {
         //console.log(year,month);
        var endMonth;
        if (['01','03', '05','07','08','10','12'].indexOf(month) > -1) {
            endMonth = 31;
        }
        else if (month == '02') {
            endMonth = 28;
        }
        else {
            endMonth = 30;
        }
        //console.log(month,endMonth);
        
        var daysUlHtml = "<ul class='days'>";
        
        for (var i = 1; i <= endMonth; i++) {
            if (i < 10) {
                var day = '0' + i;
            }
            else {
                var day = i;
            }
          
            daysUlHtml += '<li><a href="index.php?dt=' + day + '.' + month + '.' + year + '">' + i + '</a></li>';
        }  
        daysUlHtml += '</ul></div>';
    }

    $("#days").html(daysUlHtml);

});

//AJAX call for events feed
$("#show-feed").click(function(){
    var dateFrom = transformDateFormat (document.getElementById("date-from").value);
    var dateTo = transformDateFormat (document.getElementById("date-to").value);
    //console.log(dateFrom,dateTo);
    
    if (dateFrom !== "NaN.NaN.NaN" && dateTo !== "NaN.NaN.NaN") {
        var request = $.ajax({
          method: "POST",
          url: "calendar.php",
          data: {fromDate: dateFrom, toDate: dateTo},
            dataType: "json"
        })

        request.done(function(obj) {
            //console.log (obj);
            data = { "events": obj};

            template =  "<table>{{#events}}<tr><td><img src='{{image}}'></td><td id='feed-date'> {{date}} </td><td id='feed-title'> {{title}} </td><td id='feed-description'> {{description}} </td></tr>{{/events}}</table>";

            result = Mustache.render(template, data);

            var feed ='<div id="events-range">Cобытия с ' + dateFrom + ' по ' + dateTo + '</div>' + result;

            $("#feed-replace").html(feed);

        });

        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    };
});