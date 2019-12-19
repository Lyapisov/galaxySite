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
        $categoryList = Category::getCategoryByAdmin();

        if (isset($_POST['submit'])){

            $options['name'] = $_POST['name'];
            $options['category'] = $_POST['category'];
            $options['content'] = $_POST['content'];
            $options['date'] = $_POST['date'];
            $options['author'] = $_POST['author'];
            $options['visibility'] = $_POST['visibility'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Введите заголовок новости';
            }

            if(!isset($options['category']) || empty($options['category'])){
                $errors[] = 'Выберите категорию новости';
            }

            if(!isset($options['content']) || empty($options['content'])){
                $errors[] = 'Введите основной текст новости';
            }

            if(!isset($options['date']) || empty($options['date'])){
                $errors[] = 'Введите дату создания новости';
            }

            if(!isset($options['author']) || empty($options['author'])){
                $errors[] = 'Введите автора новости';
            }

            if($errors == false){
                $id = News::createNews($options);

                    if($id){
                        if(isset($_FILES["photo"]["tmp_name"])) {
                            if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                                // Если загружалось, переместим его в нужную папке, дадим новое имя
                                move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']
                                    . "/template/images/newsPhoto/{$id}.jpg");
                            }
                        }
                    }
                header("Location: /admin/news");
            }
        }
        require_once ROOT . '/views/admin/news/create.php';
        return true;
    }

    public static function actionUpdate($id)
    {

        self::checkAdmin();
        $categoryList = Category::getCategoryByAdmin();

        $news = News::getNewsById($id);

        if (isset($_POST['submit'])){

            $options['name'] = $_POST['name'];
            $options['category'] = $_POST['category'];
            $options['content'] = $_POST['content'];
            $options['date'] = $_POST['date'];
            $options['author'] = $_POST['author'];
            $options['visibility'] = $_POST['visibility'];

            $errors = [];

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Введите заголовок новости';
            }

            if(!isset($options['category']) || empty($options['category'])){
                $errors[] = 'Выберите категорию новости';
            }

            if(!isset($options['content']) || empty($options['content'])){
                $errors[] = 'Введите основной текст новости';
            }

            if(!isset($options['date']) || empty($options['date'])){
                $errors[] = 'Введите дату создания новости';
            }

            if(!isset($options['author']) || empty($options['author'])){
                $errors[] = 'Введите автора новости';
            }

            if($errors == false){
                    if($up = News::updateNews($id, $options)){
                        if(isset($_FILES["photo"]["tmp_name"])) {
                            if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                                // Если загружалось, переместим его в нужную папке, дадим новое имя
                                move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']
                                    . "/template/images/newsPhoto/{$id}.jpg");
                            }
                        }
                    }

                $news = News::getNewsById($id);
                //header("Location: /admin/");
            }
        }
        require_once ROOT . '/views/admin/news/update.php';
        return true;
    }

    public static function actionDelete($id){

        self::checkAdmin();

        if(isset($_POST["submit"])){
            News::deleteNewsById($id);
            header("Location: /admin");
        }
        require_once ROOT . "/views/admin/news/delete.php";
        return true;
    }
}