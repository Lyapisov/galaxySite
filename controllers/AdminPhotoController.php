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
        $categoryList = Category::getCategoryByAdmin();

        if (isset($_POST['submit'])){

            $options['name'] = $_POST['name'];
            $options['category'] = $_POST['category'];
            $options['date'] = $_POST['date'];
            $options['visibility'] = $_POST['visibility'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Введите заголовок новости';
            }

            if(!isset($options['category']) || empty($options['category'])){
                $errors[] = 'Выберите категорию новости';
            }

            if(!isset($options['date']) || empty($options['date'])){
                $errors[] = 'Введите дату создания новости';
            }

            if($errors == false){
                $id = Photo::createPhoto($options);

                if($id){
                    if(isset($_FILES["photo"]["tmp_name"])) {
                        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                            // Если загружалось, переместим его в нужную папке, дадим новое имя
                            move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']
                                . "/template/images/photolist/{$id}.jpg");
                        }
                    }
                }
                header("Location: /admin/photo");
            }
        }

        require_once ROOT . "/views/admin/photo/create.php";
        return true;
    }
}

