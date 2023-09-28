<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp;

use Soulrpg\CgrdNewsApp\Controller\HomeController;
use Soulrpg\CgrdNewsApp\Controller\LoginController;
use Soulrpg\CgrdNewsApp\Controller\NewsController;

class Router
{
    const routes = [
        'GET' => [
            '/' => [HomeController::class, 'home'],
            '/show-news/:id' => [NewsController::class, 'show'],
        ],
        'POST' => [
            '/login' => [LoginController::class, 'login'],
            '/create-news' => [NewsController::class, 'create'],
            '/update-news/:id' => [NewsController::class, 'update'],
            '/delete-news/:id' => [NewsController::class, 'delete'],
        ],
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