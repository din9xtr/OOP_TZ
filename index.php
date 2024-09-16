<?php

use App\Router;


require __DIR__ . '/App/autoload.php';

require __DIR__ . '/vendor/autoload.php';


try {
$router = new Router();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($url);
}catch (Throwable $exception) {
    echo "Ошибка: " . $exception->getMessage() . "\n";

    // Проверяем, есть ли предыдущее исключение
    if ($previous = $exception->getPrevious()) {
        echo "Предыдущее исключение: " . $previous->getMessage() . "\n";
    }
}