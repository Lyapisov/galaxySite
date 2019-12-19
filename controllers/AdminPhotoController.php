<?php

class AdminPhotoController extends AdminBase {

    public static function actionIndex(){

        self::checkAdmin();

        require_once ROOT . "/views/admin/photo/index.php";
        return true;
    }

    public static function actionCreate()
    {

        self::checkAdmin();

        require_once ROOT . "/views/admin/photo/create.php";
        return true;
    }
}