<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 24.11.2019
 * Time: 14:37
 */

class Photo{

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/template/images/photolist/';
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

    public static function getPhoto(){

        $db = Db::getConnectDb();
        $sql = "SELECT * FROM photo_gallery";

        $result = $db->query($sql);
        $photoGallery = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $photoGallery[$i]['id'] = $row['id'];
            $photoGallery[$i]['name'] = $row['name'];
            $photoGallery[$i]['category'] = $row['category'];
            $i++;
        }
        return $photoGallery;
    }

    public static function getRelativePath(int $id): string
    {
        $uploadedPath = $_SERVER['DOCUMENT_ROOT']. "/template/images/newsPhoto/{$id}.jpg";

        if (is_file($uploadedPath)) {
            return "/template/images/newsPhoto/{$id}.jpg";
        }

        return "/template/images/newsPhoto/no-image.jpg";
    }

    public static function getRelativePathForPhotolist(int $id): string
    {
        $uploadedPath = $_SERVER['DOCUMENT_ROOT']. "/template/images/photolist/{$id}.jpg";

        if (is_file($uploadedPath)) {
            return "/template/images/photolist/{$id}.jpg";
        }

        return "/template/images/photolist/no-image.jpg";
    }

    public static function createPhoto($options){

        $db = Db::getConnectDb();
        $sql = "INSERT INTO photo_gallery (name, category, date, visibility)" .
            "VALUES (:name, :category, :date, :visibility)";
        $result = $db->prepare($sql);

        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_INT);
        $result->bindParam(':date', $options['date'], PDO::PARAM_INT);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_INT);

        if($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }
}