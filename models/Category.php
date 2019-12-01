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
}