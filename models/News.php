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

}