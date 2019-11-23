<?php

class News{

    public static function getNews(){

        $db = Db::getConnectDb();
        $newsArray = array();

        $sql = "SELECT id, name, news_type_id, content, date, author FROM news WHERE visibility='1' ORDER BY id ASC";
        $result = $db->query($sql);

        $i=0;
        while ($row = $result->fetch()){
            $newsArray[$i]['id'] = $row['id'];
            $newsArray[$i]['name'] = $row['name'];
            $newsArray[$i]['news_type_id'] = $row['news_type_id'];
            $newsArray[$i]['content'] = $row['content'];
            $newsArray[$i]['date'] = $row['date'];
            $newsArray[$i]['author'] = $row['author'];
            $i++;
        }
        return $newsArray;
    }
}