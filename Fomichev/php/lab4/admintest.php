<?php
 session_start();
      

if (isset($_SESSION['auth']) and | $_SESSION['auth'] == true){
    $auth    //показываем админку
    
} else {
          //форма входа
          echo $login;
      };   




$login = ' 
<html>
<meta charset="utf-8">
<style>
body{

        
		background: grey;
		margin: 0
		}
h1{
			
		font-weight: 650;
		color: black;
		font-size: 30px;
		text-align: center;
		}
div{
		
		margin: 0px auto;
		text-align: center;
		}
        
input,textarea{
		background: #fff;
		border: 0;
		color: black;
		font-size: 15px;
		}
        
        
.button {

		margin-top: 50px;
		height: 50px;
		width: 125px;
		border-radius: 5px;
		border: solid 1px #45ceff;
		font-size: 1em;
		}
        
        #login{
        
        border: 1px solid black;
        }
</style>
<body>
<div id="login">
  <form action="admin.php">
       <div><h1>логин</h1><input type="login" type="login" > </div>
       <div><h1>пароль</h1><input type="password" type="password"></div>
       <div><h1>вход</h1><input type="submit"></div>
       </form></div>
</body></html>';
    
  
         
         
       