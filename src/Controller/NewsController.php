<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

use Soulrpg\CgrdNewsApp\Repository\NewsRepository;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;
use Soulrpg\CgrdNewsApp\Utility\LoginCheck;

class NewsController
{
    private NewsRepository $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    public function create(): void
    {
        LoginCheck::checkIfLoggedIn();
        $title = $_POST['title'] ?? '';
        if ($title === null) {
            FlashMessageUtility::setFlashMessage('No news title provided!', FlashMessageUtility::TYPE_ERROR);
            header('Location: /', true, 303);
            die();
        }
        $description = $_POST['description'] ?? '';

        if ($this->newsRepository->add($title, $description)) {
            FlashMessageUtility::setFlashMessage('News was successfully created!', FlashMessageUtility::TYPE_SUCCESS);
        }
        header('Location: /', true, 303);
        die();
    }

    public function update(int $id): void
    {
        LoginCheck::checkIfLoggedIn();
        $title = $_POST['title'] ?? '';
        if ($title === null) {
            FlashMessageUtility::setFlashMessage('No news title provided!', FlashMessageUtility::TYPE_ERROR);
            header('Location: /', true, 303);
            die();
        }
        $description = $_POST['description'] ?? '';

        if ($this->newsRepository->update($id, $title, $description)) {
            FlashMessageUtility::setFlashMessage('News was successfully changed!', FlashMessageUtility::TYPE_SUCCESS);
        }
        header('Location: /', true, 303);
        die();
    }

    public function delete(int $id): void
    {
        LoginCheck::checkIfLoggedIn();
        if ($this->newsRepository->remove($id)) {
            FlashMessageUtility::setFlashMessage('News was deleted!', FlashMessageUtility::TYPE_SUCCESS);
        }
        header('Location: /', true, 303);
        die();
    }
}