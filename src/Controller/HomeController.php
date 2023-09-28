<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

class HomeController
{
    public function home(): void 
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Templates');
        $twig = new \Twig\Environment($loader);

        echo $twig->render('home.html');
    }
}
