<?php

class CabinetController{

    public function actionIndex(){

        $userId = User::checkLogget();
        $user = User::getUserById($userId);

        require_once ROOT . '/views/user/cabinet.php';
        return true;
    }

    public function actionEdit(){

        $userId = User::checkLogget();
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не менее 6-ти символов';
            }

            if ($errors == false){
                $result = User::edit($userId, $name, $password);
            }
        }
        require_once ROOT . '/views/user/edit.php';
        return true;
    }
}