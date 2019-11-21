<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 17.11.2019
 * Time: 20:29
 */

class Router{

    private $routes;

    public function __construct(){

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    public function getURI(){

        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){



    }
}