<?php
return [
    '/' => function () {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->index_auth();
    },

    '/post/show/{id}' => function ($id) {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->show($id);
    },

    '/post/loadMore' => function () {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->loadMore();
    },

    '/update' => function () {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->update();
    },

    '/post/create' => function () {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->create();
    },

    '/delete' => function () {
        $ctrl = new \App\Controllers\PostController();
        $ctrl->delete();
    },

    '/user/reg' => function () {
        $ctrl = new \App\Controllers\UserController();
        $ctrl->reg();
    },

    '/user/auth' => function () {
        $ctrl = new \App\Controllers\UserController();
        $ctrl->auth_user();
    },

    '/user/auth_user' => function () {
        $ctrl = new \App\Controllers\UserController();
        $ctrl->auth();
    },

    '/user/exit' => function () {
        $ctrl = new \App\Controllers\UserController();
        $ctrl->exit();
    },

    '/favorite_add' => function () {
        $ctrl = new \App\Controllers\FavoriteController();
        $ctrl->addFavorite();
    },

    '/favorite_remove' => function () {
        $ctrl = new \App\Controllers\FavoriteController();
        $ctrl->removeFavorite();
    },

    '/add_comment' => function () {
        $ctrl = new \App\Controllers\CommentController();
        $ctrl->addComment();
    },

    '/comment_status' => function () {
        $ctrl = new \App\Controllers\CommentController();
        $ctrl->statusCommentChoise();
    },

    '/chat' => function () {
        $ctrl = new \App\Controllers\ChatController();
        $ctrl->index();
    },
];
