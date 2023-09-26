<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp;

class Router
{
    const routes = [
        'GET' => [
            '/' => [HomeController::class, 'home'],
            '/login' => [LoginController::class, 'login'],
            '/news' => [NewsController::class, 'list'],
            '/news/:id' => [NewsController::class, 'show'],
        ],
        'POST' => [
            '/news' => [NewsController::class, 'create'],
        ],
        'PUT' => [
            '/news/:id' => [NewsController::class, 'update'],
        ],
        'DELETE' => [
            '/news/:id' => [NewsController::class, 'delete'],
        ]
    ];

    public function start(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if (!isset(self::routes[$method])) {
            throw new \Exception('Route method not found.');
        }
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        $pathParts = explode('/', $path);
        $param = '';
        if (isset($pathParts[2]) && ctype_digit($pathParts[2])) {
            $param = (int) $pathParts[2];
            $pathParts[2] = ':id';
            $path = implode('/', $pathParts);
        } 
        $callable = self::routes[$method][$path];
        if (!isset($callable)) {
            throw new \Exception('Route path not found.');
        }
        $controller = new $callable[0];
        if ($param) {
            $controller->{$callable[1]}($param);
        } else {
            $controller->{$callable[1]}();
        }
    }
}