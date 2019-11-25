<?php

class User{

    //Запись данных при регистрации пользователя
    public static function register($name, $email, $password){
            $db = Db::getConnectDb();
            $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
            $result = $db->prepare($sql);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $password, PDO::PARAM_STR);

            return $result->execute();
    }

    //Проверка имени на правильность
    public static function checkName($name){
        if(strlen($name)>2) {
            return true;
        }
        return false;
    }

    //Проверка Емфйла на правильность
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    //Проверка пароля на правильность
    public static function checkPassword($password){
        if(strlen($password)>2){
            return true;
        }
        return false;
    }

    //Проверка на существование емэйла
    public static function checkEmailExist($email){

        $db = Db::getConnectDb();
        $sql = "SELECT COUNT(*) FROM user WHERE email=:email";
        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn()){
            return true;
        }
        return false;
    }

    public static function checkUserData($email, $password){
        $db = Db::getConnectDb();
        $sql = "SELECT * FROM user WHERE email=:email AND password=:password";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        } else {
            return false;
        }
    }

    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }

    public static function checkLogget(){
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login/");
    }

    public static function isGuest(){
        if (isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function getUserById($userId){

        if($userId){

            $db = Db::getConnectDb();
            $sql = "SELECT * FROM user WHERE id=:id";

            $result = $db->prepare($sql);
            $result->bindParam(":id", $userId, PDO::PARAM_STR);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($userId, $name, $password){

        $db = Db::getConnectDb();
        $sql = "UPDATE user SET name=:name, password=:password WHERE id=:id";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);

        return $result->execute();
    }
}