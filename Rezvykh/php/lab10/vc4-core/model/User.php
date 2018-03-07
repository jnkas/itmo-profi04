<?php


class User
{
    public static function checkName($name) {
        if (strlen($name) >= 5) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 8) {
            return TRUE;
        }
        return FALSE;
    }

    public static function checkEmailExist($email) {
        $db = new MyPDO();
        $sql = 'SELECT COUNT(*) FROM users WHERE email=:email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_NUM);
        $count = $result->fetch();

        if ($count[0] == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }

    public static function register($name, $email, $password) {
        $db = new MyPDO();
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkUserExist($email, $password) {

        $db = new MyPDO();
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        } else {
            return FALSE;
        }
    }

    public static function checkAuth() {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header('Location: ' . ROOTSITE . 'user/login');
    }
    public static function isAuth() {
        if (isset($_SESSION['user'])) {
            return TRUE;
        }
        return FALSE;
    }

    public static function isAdmin() {

        if (User::isAuth()) {
            $userId = User::checkAuth();
            $db = new MyPDO();
            $sql = 'SELECT COUNT(*) FROM users WHERE id = :userId AND is_admin = 1';
            $result = $db->prepare($sql);
            $result->bindParam(':userId', $userId, PDO::PARAM_STR);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_NUM);
            $count = $result->fetch();

            if ($count[0] == 1) {
                return TRUE;
            }
            return FALSE;

        } else {
            return FALSE;
        }
    }
    public static function getName() {
        $userId = User::checkAuth();

        if (isset($userId)) {
            $db = new MyPDO();
            $sql = 'SELECT * FROM users WHERE id =:userId ';
            $result = $db->prepare($sql);
            $result->bindParam(':userId', $userId, PDO::PARAM_STR);
            $result->execute();
            $user = $result->fetch();

            if ($user) {
                return $user['name'];
            }
            return FALSE;
        }


    }
}
















