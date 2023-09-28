<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

use Soulrpg\CgrdNewsApp\Repository\NewsRepository;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;

class NewsController
{
    private NewsRepository $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    public function create(): void
    {
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
    }

    public function update(int $id): void
    {
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
    }

    public function delete(int $id): void
    {
        if ($this->newsRepository->remove($id)) {
            FlashMessageUtility::setFlashMessage('News was deleted!', FlashMessageUtility::TYPE_SUCCESS);
        }
    }
}