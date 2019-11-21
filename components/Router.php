<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 17.11.2019
 * Time: 20:29
 */

class Router{

    private $routes;
    //Присваиваем, при создании в index.php объекта Роутер,
    //свойству роутес массив с маршрутами.
    public function __construct(){

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }
    //Метод для получения запроса из адресной строки, для инициализации массива роутерс на след этапе.
    public function getURI(){

        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    //Метод для сравнения полученных данных из адресной строки и данных с массивом роутерс
    public function run(){
        //Получение ключа из адресной строки
        $uri = $this->getURI();
        //Проход по массиву для поиска совпадений запроса с ключом масива роутер
        foreach ($this->routes as $uriPattern => $path){
            //Если запрос совпадает с одним из ключей массива, то
            if (preg_match("~$uriPattern~", $uri)){
                //Меняем Запрос на Путь из массива роутес
                $internalRout = preg_replace("~$uriPattern~", $path, $uri);
                // Определить контроллер, action, параметры
                //Вернул массив с двумя словами без делителя
                $segments = explode('/', $internalRout);
                //Получаю имя контроллера вытащив первое слово из массива
                $controllerName = array_shift($segments);
                //Добавляю к вытащенному слову слово контроллер для следования шаблоу
                $controllerName = $controllerName . 'Controller';
                //Первая буква заглавная, аперкейс
                $controllerName = ucfirst($controllerName);
                //Вытаскиваю второе слово и леплю с большой буквой к слову экшн
                $actionName = 'action' . ucfirst(array_shift($segments));
                //остатки от массива отправляю в параметры для будуших маршрутов
                $parameters = $segments;

                //Создаю переменную содержащую путь к файлу контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                //Если путь к контроллеру успешно создан, то
                if(file_exists($controllerFile)){
                    //Подключаю файл
                    include_once ($controllerFile);
                }
                //Создаю объект контроллера и запускаю экшн
                $controllerObject = new $controllerName();
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null){
                    break;
                }
            }
        }
    }
}