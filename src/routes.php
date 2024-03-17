<?php

$routes = [

    '/' => [HelloController::class, 'world'],
    '/hidden' => [HiddenController::class, 'index', [AuthMiddleware::class]],

    '/about' => function () {
        echo 'About page!';
    },
    '/error' => function () {
        return 'Could not find this page.';
    }


];