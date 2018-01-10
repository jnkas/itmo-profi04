
$(function() {
    $('#btn1').click(function() {
      
       var date_start = $('#date_start').val();
       var date_end = $('#date_end').val();
       
       var request = $.ajax({
          url: "serviser_tmpl.php",
          method: "POST",
          data: { 'date_start' : date_start, 'date_end' : date_end}
        });

        request.done(function( obj ) {  
          var arr = JSON.parse(obj);
          console.log(arr);
         
          
          //var template1 = "{{# list}} <b>{{title}}</b> {{descr}}<br> {{/ list}}";
          //var template1 = "{{# list}} <b>{{date}}</b><br> {{/ list}}";

          var template1 = '{{# list}} <div style="border: 1px solid red; width: 80% ;margin: auto;" class="form-group form-control-lg;"> <div style="display: inline-block; width: 19%;">    <img style= "width: 140px;     margin-top: -40px; margin-left: 7%;" src=" {{img}} "></div> <div style= "text-align: center; display: inline-block; width: 80%;"> <pre style= "font-size:20px";> {{date}} </pre> <h4> {{title}} </h4><hr><br> <p style="width: 100%; margin: auto; margin-top: -32px;"> {{descr}} </div></p><hr></div>{{/ list}}';
          //console.log(template);
          Mustache.clearCache();
          result = Mustache.render(template1, arr);
          console.log(result);
          console.log(Mustache.to_html(template1, arr));
          
          $('#log').html(result); 
        });
         
        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
     });
});





