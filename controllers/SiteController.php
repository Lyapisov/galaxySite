<?php

class SiteController{

    public static function actionIndex(){

        $newsInfo = array();
        $newsInfo = News::getNews();

        $photoGallery = array();
        $photoGallery = Photo::getPhoto();

        require_once ROOT . '/views/site/index.php';
        return true;
    }

}