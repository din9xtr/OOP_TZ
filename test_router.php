<?php

$routes = [];

// Функция для добавления маршрутов
function add_route($route, $callback)
{
    global $routes;
    // Преобразуем параметры маршрута в регулярные выражения
    $route = preg_replace('/\{(\w+)\}/', '(?P<$1>\d+)', $route);
    $routes[$route] = $callback;
}

// Функция для обработки запроса и вызова соответствующего контроллера и метода
function dispatch($url)
{
    global $routes;

    foreach ($routes as $route => $callback) {
        $pattern = "@^" . $route . "$@D";
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

add_route('/', function () {
    $ctrl = new \App\Controllers\PostController();
    $ctrl->index_auth();
});

add_route('/post/show/{id}', function ($id) {

    $ctrl = new \App\Controllers\PostController();
    $ctrl->show($id);

});
add_route('/post/loadMore', function () {
    $ctrl = new \App\Controllers\PostController();
    $ctrl->loadMore();
});
add_route('/update', function () {
    $ctrl = new \App\Controllers\PostController();
    $ctrl->update();
});

add_route('/post/create', function () {
    $ctrl = new \App\Controllers\PostController();
    $ctrl->create();
});
add_route('/delete', function () {
    $ctrl = new \App\Controllers\PostController();
    $ctrl->delete();
});
add_route('/user/reg', function () {
    $ctrl = new \App\Controllers\UserController();
    $ctrl->reg();
});

add_route('/user/auth', function () {
    $ctrl = new \App\Controllers\UserController();
    $ctrl->auth_user();
});
add_route('/user/auth_user', function () {
    $ctrl = new \App\Controllers\UserController();
    $ctrl->auth();
});

add_route('/user/exit', function () {
    $ctrl = new \App\Controllers\UserController();
    $ctrl->exit();
});
add_route('/favorite_add', function () {
    $ctrl = new \App\Controllers\FavoriteController();
    $ctrl->addFavorite();
});
add_route('/favorite_remove', function () {
    $ctrl = new \App\Controllers\FavoriteController();
    $ctrl->removeFavorite();
});

add_route('/add_comment', function () {
    $ctrl = new \App\Controllers\CommentController();
    $ctrl->addComment();
});
add_route('/comment_status', function () {
    $ctrl = new \App\Controllers\CommentController();
    $ctrl->statusCommentChoise();
});
add_route('/chat', function () {
    $ctrl = new \App\Controllers\ChatController();
    $ctrl->index();
});

// Получение текущего URL (без query string)
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Обработка маршрута
dispatch($url);
