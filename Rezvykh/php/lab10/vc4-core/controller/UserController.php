<?php

class UserController
{
    public function actionRegister() {

        $name = '';
        $email = '';
        $password = '';
        $result = FALSE;

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $err = FALSE;

            if (!User::checkName($name)) {
                $errName = TRUE;
                $err['name'] = "Имя должно быть длиннее 5 символов";
            }

            if (!User::checkEmail($email)) {
                $errEmail = TRUE;
                $err['email'] = "Неправильный формат электронной почты";
            }

            if (!User::checkPassword($password)) {
                $errPassword = TRUE;
                $err['password'] = "Пароль должен быть длиннее 8 символов";
            }

            if (!User::checkEmailExist($email)) {
                $errEmail = TRUE;
                $err['email'] = "Аккаут с таким email существует!";
            }

            //Если нет ошибок при заполнении формы
            if ($err == FALSE) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOTDIR . '/vc4-core/view/user/register.php');
        return true;
    }

    public function actionLogin() {
        $email = '';
        $password = '';
        $err = FALSE;

        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userId = User::checkUserExist($email,$password);

            if ($userId == FALSE) {
                $errAuth = TRUE;
                $err['auth'] = 'Неправильно введен логин или пароль!';
            } else {
                User::auth($userId);
                header("Location: " . ROOTSITE . "");
            }
        }
        require_once(ROOTDIR . '/vc4-core/view/user/login.php');
        return true;
    }
    public function actionLogout() {
        unset($_SESSION['user']);
        header('Location: ' . ROOTSITE . '');
    }

}