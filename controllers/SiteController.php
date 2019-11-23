<?php

class SiteController{

    public static function actionIndex(){

        $newsInfo = array();
        $newsInfo = News::getNews();
        require_once ROOT . '/views/site/index.php';
        return true;
    }

}