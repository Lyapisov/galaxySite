<?php

class News{

    public static function getNews(){

        $db = Db::getConnectDb();
        $newsArray = array();

        $sql = "SELECT id, name, category, content, date, author FROM news WHERE visibility='1' ORDER BY id ASC";
        $result = $db->query($sql);

        $i=0;
        while ($row = $result->fetch()){
            $newsArray[$i]['id'] = $row['id'];
            $newsArray[$i]['name'] = $row['name'];
            $newsArray[$i]['category'] = $row['category'];
            $newsArray[$i]['content'] = $row['content'];
            $newsArray[$i]['date'] = $row['date'];
            $newsArray[$i]['author'] = $row['author'];
            $i++;
        }
        return $newsArray;
    }

    public static function getNewsByAdmin(){

        $db = Db::getConnectDb();
        $newsArray = array();

        $sql = "SELECT * FROM news ORDER BY id ASC";
        $result = $db->query($sql);

        $i=0;
        while ($row = $result->fetch()){
            $newsArray[$i]['id'] = $row['id'];
            $newsArray[$i]['name'] = $row['name'];
            $newsArray[$i]['category'] = $row['category'];
            $newsArray[$i]['content'] = $row['content'];
            $newsArray[$i]['photo'] = $row['photo'];
            $newsArray[$i]['date'] = $row['date'];
            $newsArray[$i]['author'] = $row['author'];
            $newsArray[$i]['visibility'] = $row['visibility'];
            $i++;
        }
        return $newsArray;
    }

    public static function getStatusNews($status){

        if($status == 1){
            return 'Отображается';
        }
        return 'Скрыта';
    }

    public static function createNews($options){

        $db = Db::getConnectDb();
        $sql = "INSERT INTO news (name, category, content, date, author, visibility)" .
                "VALUES (:name, :category, :content, :date, :author, :visibility)";
        $result = $db->prepare($sql);

        $result->bindParam('name', $options['name'], PDO::PARAM_STR);
        $result->bindParam('category', $options['category'], PDO::PARAM_INT);
        $result->bindParam('content', $options['content'], PDO::PARAM_STR);
        $result->bindParam('date', $options['date'], PDO::PARAM_STR);
        $result->bindParam('author', $options['author'], PDO::PARAM_STR);
        $result->bindParam('visibility', $options['visibility'], PDO::PARAM_INT);

        if($result->execute()){
           return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateNews($id, $options){

        $db = Db::getConnectDb();
        $sql = "UPDATE news
                SET
                name = :name,
                category = :category,
                content = :content,
                date = :date,
                author = :author,
                visibility = :visibility
                WHERE id = :id";
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_INT);


        return $result->execute();
    }

    public static function deleteNewsById($id){

        $db = Db::getConnectDb();
        $sql = "DELETE FROM news WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getNewsById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnectDb();

            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/template/images/newsPhoto/';
        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}