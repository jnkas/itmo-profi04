$(function() {
  $('#actionBTN').on("click", function() {
    // action = delete/ get / 
    //alert(this.value);
    //console.log(this.value);
    //console.log($("#file_id").val());
    var request_content = $.ajax({
      url: "index.php",
      method: "POST",
      data: {"controller" : "controller" ,"action" : this.value, "file_id" : $("#file_id").val()}
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

$(function() {
  $('#editBTN2').on("click", function() {
    //alert(this.value);
    //console.log(this.value);
    //console.log($("#file_id").val());
    var request_content = $.ajax({
      url: "index.php",
      method: "POST",
      data: {"controller" : "controller" ,"action" : this.name, "file_id" : this.value, 'file_content': $("#file_content").val()}
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

$(function() {
  $('#addBTN').on("click", function() {
    //alert(this.value);
    //console.log(this.value);
    //console.log($("#file_id").val());
    var request_content = $.ajax({
      url: "index.php",
      method: "POST",
      data: {"controller" : "controller" ,"action" : this.name, "file_name" : $("#file_name").val(), 'file_content': $("#file_content").val()}
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