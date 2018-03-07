<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php_Lab9_admin</title>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
<form action="/Authorization/registrationUser" method="post" id="authorizationId">
    <label for="loginRegId">login:</label><input type="text" name="loginRegName" id="loginRegId" required>
    <label for="passwordRegId">password:</label><input type="text" name="passwordRegName" id="passwordRegId" required>
    <label for="fullNameRegId">full name:</label><input type="text" name="fullNameReg" id="fullNameRegId">
    <label for="emailRegId">email:</label><input type="email" name="emailRegName" id="emailRegId">
    <label for="phoneRegId">phone number:</label><input type="text" name="phoneRegName" id="phoneRegId">
    <button>Add user</button>
</form>
</body>
</html>