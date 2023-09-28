<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;

class HomeController
{
    public function home(): void 
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Templates');
        $twig = new \Twig\Environment($loader);

        $flashMessage = FlashMessageUtility::getFlashMessage();

        echo $twig->render('home.html', ['flashMessage' => $flashMessage]);
    }
}
