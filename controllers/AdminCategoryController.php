<?php

class AdminCategoryController extends AdminBase{

    public static function actionIndex(){
        $categoryList = Category::getCategoryByAdmin();

        self::checkAdmin();

        require_once ROOT . '/views/admin/category/index.php';
        return true;
    }

    public static function actionCreate()
    {

        self::checkAdmin();
        $categoryList = Category::getCategoryByAdmin();

        if (isset($_POST['submit'])){

            $options['name'] = $_POST['name'];
            $options['news_type'] = $_POST['news_type'];
            $options['visibility'] = $_POST['visibility'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Введите заголовок новости';
            }

            if($errors == false){
                $id = Category::createCategory($options);

                header("Location: /admin/category");
            }
        }
        require_once ROOT . '/views/admin/category/create.php';
        return true;
    }

    public static function actionUpdate($id)
    {

        self::checkAdmin();
        $categoryList = Category::getCategoryByAdmin();

        $category = Category::getCategoryByAdminById($id);

        if (isset($_POST['submit'])){

            $options['name'] = $_POST['name'];
            $options['news_type'] = $_POST['news_type'];
            $options['visibility'] = $_POST['visibility'];

            $errors = [];

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Введите заголовок новости';
            }

            if($errors == false) {
                $id = Category::updateCategory($id, $options);

                header("Location: /admin/category");

                $category = Category::getCategoryByAdminById($id);
            }

        }
        require_once ROOT . '/views/admin/category/update.php';
        return true;
    }

    public static function actionDelete($id){

        self::checkAdmin();

        if(isset($_POST["submit"])){
            Category::deleteCategoryById($id);
            header("Location: /admin/category");
        }
        require_once ROOT . "/views/admin/category/delete.php";
        return true;
    }
}