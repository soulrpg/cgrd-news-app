<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

use Soulrpg\CgrdNewsApp\Repository\NewsRepository;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;

class HomeController
{
    public function home(): void
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Templates');
        $twig = new \Twig\Environment($loader);

        $flashMessage = FlashMessageUtility::getFlashMessage();

        if ($_SESSION['loggedIn']) {
            $newsRepository = new NewsRepository();
            $news = $newsRepository->getAll();
            echo $twig->render('news.html', ['flashMessage' => $flashMessage, 'news' => $news]);
        } else {
            echo $twig->render('home.html', ['flashMessage' => $flashMessage]);
        }
    }
}
