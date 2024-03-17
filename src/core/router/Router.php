<?php

class Router implements IRouter
{

    private function executeMiddlewares(array $middlewares): void
    {
        foreach ($middlewares as $middlewareClass) {
            $instance = (new $middlewareClass);
            if ($instance->canPass()) continue;

            echo $instance->onFail();
            die;
        }
    }

    function route($routes): void
    {
        $path = $_GET["path"] ?? '';
        $pathChars = str_split($path);
        $lastChar = array_pop($pathChars);

        if ($lastChar === '/') {
            $lastChar = '';
        }

        $path = implode($pathChars) . $lastChar;

        if (!array_key_exists("/{$path}", $routes)) {
            $path = 'error';
        }

        $routerResult = $routes["/" . $path];
        $routeHasExtendedData = is_array($routerResult);

        if (!$routeHasExtendedData) {
            echo $routerResult();
            return;
        }

        $controllerName = $routerResult[0];
        $actionName = $routerResult[1];
        $middlewares = $routerResult[2] ?? '';

        if (is_array($middlewares)) {
            $this->executeMiddlewares($middlewares);
        }

        echo (new $controllerName)->$actionName();
    }


}