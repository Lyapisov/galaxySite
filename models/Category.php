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
        $sql = "SELECT * FROM category ORDER BY news_type ASC";

        $result = $db->query($sql);

        $categoryList = array();

        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['news_type'] = $row['news_type'];
            $categoryList[$i]['status'] = $row['status'];
        $i++;
        }
        return $categoryList;
    }
}