<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 22.11.2019
 * Time: 22:46
 */

class Db{

    public static function getConnectDb(){

        $path = ROOT . '/config/db_params.php';
        $arrayDbParams = include($path);

        $dsn = "mysql:host={$arrayDbParams['host']}; dbname={$arrayDbParams['dbname']}";
        $connectDb = new PDO($dsn, $arrayDbParams['user'], $arrayDbParams['password']);
        $connectDb -> exec("set names utf8");

        return $connectDb;
    }
}