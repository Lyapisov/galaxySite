<?php

abstract class AdminBase{

    public static function checkAdmin(){

        $userId = User::checkLogget();
        $user = User::getUserById($userId);

        if ($user['status'] == 'admin'){
            return true;
        }
        die('Доступ запрещен');
    }
}