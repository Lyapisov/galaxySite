<?php

class AdminNewsController extends AdminBase{

    public static function actionIndex(){

        self::checkAdmin();
        $newsInfo = News::getNewsByAdmin();

        require_once ROOT . '/views/admin/news/index.php';
        return true;
    }

    public static function actionCreate()
    {

        self::checkAdmin();


        $newsInfo = News::getNewsByAdmin();

        require_once ROOT . '/views/admin/news/create.php';
        return true;
    }
}