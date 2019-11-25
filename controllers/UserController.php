<?php

class UserController
{

    public function actionLogin(){

        $email = '';
        $password = '';

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)){
                $errors[] = 'Введите существующий E-mail';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Введите пароль длинной не менее 6 символов';
            }

            $userId = User::checkUserData($email, $password);

            if($userId == false){
                $errors[] = 'Неверный E-mail или пароль';
            } else {
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }
        require_once ROOT . '/views/user/login.php';
        return true;
    }

    public function actionRegister(){

        $email = '';
        $password = '';
        $name = '';
        $result = '';

        if (isset($_POST['submit'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Введите имя длинной не менее 2-х символов';
            }

            if (!User::checkEmail($email)){
                $errors[] = 'Введите существующий E-mail';
            }

            if (!User::checkPassword($password)){
                $errors[] = 'Введите пароль длинной не менее 6 символов';
            }

            if (User::checkEmailExist($email)){
                $errors[] = 'Данный E-mail уже занят';
            }

            if ($errors == false){
                $result = User::register($name, $email, $password);
            }
        }
        require_once ROOT . '/views/user/register.php';
        return true;
    }

    public static function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }
}