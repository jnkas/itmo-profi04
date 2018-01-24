         
var request = $.ajax({
  url: "serviser_lab6.php",
  method: "POST",
});
console.log(request); 
      
request.done(function( obj ) {  
  var arr = JSON.parse(obj);
  console.log(arr);
  var  i; //x = "";
  var template1 ="<tr>{{#arrCategory}}<th style=\"text-align: center;\">{{cat}} </th> {{/arrCategory}} </tr><tr>";
  //var arrCategory_name ={"arrCategory":[], "struct" : {}};

  console.log(arr);

  for (el in arr["struct"]) {
      //x += el + "<br>";
      //  console.log(el);
      //arrCategory_name.arrCategory.push({"cat":el});
      //arrCategory_name.struct[el] = [];
    template1 += " <td><ul style=\"list-style-type:none;\">{{#struct."+el+"}}<li><input class=\"page_cont\" type=\"button\" id=\""+el+"/{{page}}\" value=\"{{page}}\"/></li>{{/struct."+el+"}}</ul></td>";
      /*for (element in arr["struct"][el]){
        console.log("el: "+arr["struct"][el][element]);
        arrCategory_name.struct[el].push({"page":arr["struct"][el][element]});
      }*/
  } 
    


  console.log(request); 
    
    //<input id="btn1" type="button" value="Create Event List"/>
  template1 += "</tr>";
    //arrCategory_name= {"arrCategory":arrCategory, "struct" : arr.struct};
    //console.log(arrCategory);
    //console.log(arrCategory_name);
    //document.getElementById("demo").innerHTML = x;  
  console.log(template1);
    
    
    //var template1 = "{{# list}} <b>{{date}}</b><br> {{/ list}}";

   // var template1 = '{{# list}} <div style="border: 1px solid red; width: 80% ;margin: auto;" class="form-group form-control-lg;"> <div style="display: inline-block; width: 19%;">    <img style= "width: 140px;     margin-top: -40px; margin-left: 7%;" src=" {{img}} "></div> <div style= "text-align: center; display: inline-block; width: 80%;"> <pre style= "font-size:20px";> {{date}} </pre> <h4> {{title}} </h4><hr><br> <p style="width: 100%; margin: auto; margin-top: -32px;"> {{descr}} </div></p><hr></div>{{/ list}}';
    //console.log(template);
  Mustache.clearCache();
  result = Mustache.render(template1, arr);
  console.log(result);
    //console.log(Mustache.to_html(template1, arrCategory_name);
    
  $('#struct').html(result); 
});
   
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});
     //});

$(function() {
  $('.page_cont').click(function() {
    //alert(this.value);
    console.log(this.id);
    var request_content = $.ajax({
      url: "serviser_readed_lab6.php",
      method: "POST",
      data: {"id" : this.id}
    });

    request_content.done(function( obj ) {  
      console.log(obj);
      $('#content').html(obj); 
    });

    request_content.fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });
  });
});

