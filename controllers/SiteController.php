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

    public static function actionContacts(){

        $newsInfo = array();
        $newsInfo = News::getNews();

        $photoGallery = array();
        $photoGallery = Photo::getPhoto();

        require_once ROOT . '/views/site/contacts.php';
        return true;
    }

    public static function actionAboutUs(){
        $newsInfo = array();
        $newsInfo = News::getNews();

        $photoGallery = array();
        $photoGallery = Photo::getPhoto();

        require_once ROOT . '/views/site/about_us.php';
        return true;
    }

    public static function actionPhotogalery(){
        $newsInfo = array();
        $newsInfo = News::getNews();

        $photoGallery = array();
        $photoGallery = Photo::getPhoto();

        require_once ROOT . '/views/site/photogalery.php';
        return true;
    }

}