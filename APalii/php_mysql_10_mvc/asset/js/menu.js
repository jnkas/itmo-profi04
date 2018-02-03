$(function() {
  $('.action').on("click", function() {
    //alert(this.value);
    console.log(this.id);
    var request_content = $.ajax({
      url: "index.php",
      method: "POST",
      data: {"controller" : "controller" ,"action" : this.id}
    });

    request_content.done(function( obj ) {  
      console.log(obj);
      $('#body').html(obj); 
    });

    request_content.fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });
  });
});
