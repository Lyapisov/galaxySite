<?php


class AdminController extends AdminBase {

    public static function actionIndex(){

        $userId = User::checkLogget();
        $user = User::getUserById($userId);
        self::checkAdmin();
        require_once ROOT . '/views/admin/index.php';
        return true;
    }
}