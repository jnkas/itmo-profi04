;(function event() {
 	  var msg = $('#formAdmin').serialize();
        $.ajax({
          type: 'POST',
          url: "handler.php",
          data: msg,
          success: function(data) {
            $('#results').html(data);
          },
          error:  function(xhr, str){
	        alert('Возникла ошибка: ' + xhr.responseCode);
          }
        }
}());