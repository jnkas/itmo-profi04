$(document).ready(function () {
    $("#password, #confirm, #login").keyup(checkPasswordMatch);
});
            
$("#register").prop("disabled",true);
            
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm").val();
    var login = $("#login").val();
                
    if (password !== confirmPassword) {
//        $("#error").css({display:"inline"});
//        $("#error").html("Пароли не совпадают");
        $("#confirm").css({"background":"#ff6666"});
        $("#register").prop("disabled",true);
    }
    
    else if (!password && !confirmPassword){
        $("#confirm").css({"background":"white"});
        $("#register").prop("disabled",true);
    }
    
    else {
//        $("#error").css({display:"none"});
        $("#confirm").css({"background":"#66cc66"});
        if (login) {
            $("#register").prop("disabled",false);  
            }
        else {
            $("#register").prop("disabled",true);
        }
    }
                
}