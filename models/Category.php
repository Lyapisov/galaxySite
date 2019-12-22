<?php

class Category{

    public static function getCategory($categoryNumber)
    {

        switch ($categoryNumber) {
            case '1' :
                return 'ИЗО';
                break;
            case '2':
                return 'Лепка';
                break;
            case '3':
                return 'Английский';
                break;
            case '4':
                return 'Вышивание';
                break;
        }
    }



    public static function getCategoryByAdmin(){

        $db = Db::getConnectDb();
        $sql = "SELECT * FROM category ORDER BY id ASC";

        $result = $db->query($sql);

        $categoryList = array();

        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['news_type'] = $row['news_type'];
            $categoryList[$i]['visibility'] = $row['visibility'];
        $i++;
        }
        return $categoryList;
    }

    public static function createCategory($options){

        $db = Db::getConnectDb();
        $sql = "INSERT INTO category (name, news_type, visibility)" .
            "VALUES (:name, :news_type, :visibility)";
        $result = $db->prepare($sql);

        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':news_type', $options['news_type'], PDO::PARAM_INT);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_INT);

        if($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateCategory($id, $options){

        $db = Db::getConnectDb();
        $sql = "UPDATE category
                SET
                name = :name,
                news_type = :news_type,
                visibility = :visibility
                WHERE id = :id";
        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':news_type', $options['news_type'], PDO::PARAM_INT);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function deleteCategoryById($id){

        $db = Db::getConnectDb();
        $sql = "DELETE FROM category WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getCategoryByAdminById($id){
        $id = intval($id);

        if ($id) {
            $db = Db::getConnectDb();

            $result = $db->query('SELECT * FROM category WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }
}