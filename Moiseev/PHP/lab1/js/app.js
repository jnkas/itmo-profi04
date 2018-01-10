var dt = "12.02.2017";
var request = $.ajax({
  url: "serviser.php",
  method: "POST",
  data: { id : dt },
  dataType: "json"
});

request.done(function (obj) {
    consol.log(obj);
    $('#day-calendar').html("<h1>" + obj.date + "</h1>" + "<h2>" + obj.header + "</h2>" + "<img src=" + obj.img + ">" + "<p>" + obj.desc + "</p>");
});


