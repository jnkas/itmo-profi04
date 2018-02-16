<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/app.js"></script>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
   <h2>Просмотр и редактирование страниц</h2>
   <main class="admin_page">
       
        <table class="users_table">
            <tr class="th">
                <th>id</th>
                <th>name</th>
                <th>login</th>
                <th>age</th>
                <th>email</th>
                <th>actions</th>
            </tr>
            <tr class="add">
                <td>n</td>
                <td><input type="text" id="name" placeholder="Введите имя"></td>
                <td><input type="text" id="login" placeholder="Введите логин"></td>
                <td><input type="number" id="age" placeholder="Введите возраст"></td>
                <td><input type="email" id="email" placeholder="Введите email"></td>
                <td><button>Add</button></td>
            </tr>
       </table>
   </main>

</body>
</html>
