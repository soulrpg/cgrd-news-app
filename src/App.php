<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp;

class App
{
    private Router $router;

    public function __construct() {
        $this->router = new Router();
        $this->router->start();
    }
}
