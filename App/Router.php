<?php
namespace App;

class Router
{
    private $routes = [];

    // Конструктор для загрузки маршрутов из конфигурационного файла
    public function __construct()
    {
        $this->routes = require __DIR__ .'/../config/routes.php';
    }

    // Функция для обработки запроса и вызова соответствующего контроллера и метода
    public function dispatch($url)
    {
        foreach ($this->routes as $route => $callback) {
            $pattern = "@^" . preg_replace('/\{(\w+)\}/', '(?P<$1>\d+)', $route) . "$@D";
            if (preg_match($pattern, $url, $matches)) {
                // Извлекаем параметры
                array_shift($matches); // удаляем полный путь
                return call_user_func_array($callback, array_values($matches));
            }
        }

        // Если маршрут не найден, можно отобразить страницу 404
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found
            <a href="/" class="btn btn-success">Главная</a>
        ';
    }
}




