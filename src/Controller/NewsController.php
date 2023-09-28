<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

use Soulrpg\CgrdNewsApp\Repository\NewsRepository;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;

class NewsController
{
    public function create(): void
    {
        $newsRepository = new NewsRepository();

        $title = $_POST['title'] ?? '';
        if ($title === null) {
            FlashMessageUtility::setFlashMessage('No news title provided!', FlashMessageUtility::TYPE_ERROR);
            header('Location: /', true, 303);
            die();
        }
        $description = $_POST['description'] ?? '';

        if ($newsRepository->add($title, $description)) {
            FlashMessageUtility::setFlashMessage('News was successfully created!', FlashMessageUtility::TYPE_SUCCESS);
        }
    }

    public function update(int $id): void
    {
        $newsRepository = new NewsRepository();

        $title = $_POST['title'] ?? '';
        if ($title === null) {
            FlashMessageUtility::setFlashMessage('No news title provided!', FlashMessageUtility::TYPE_ERROR);
            header('Location: /', true, 303);
            die();
        }
        $description = $_POST['description'] ?? '';

        if ($newsRepository->update($id, $title, $description)) {
            FlashMessageUtility::setFlashMessage('News was successfully changed!', FlashMessageUtility::TYPE_SUCCESS);
        }
    }

    public function delete(int $id): void
    {
        $newsRepository = new NewsRepository();

        if ($newsRepository->remove($id)) {
            FlashMessageUtility::setFlashMessage('News was deleted!', FlashMessageUtility::TYPE_SUCCESS);
        }
    }
}