<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 23.11.2019
 * Time: 15:04
 */

class UserController
{

    public static function actionLogin(){

        require_once ROOT . '/views/user/login.php';
        return true;
    }
}