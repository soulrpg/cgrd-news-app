<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Utility;

class FlashMessageUtility
{
    const TYPE_ERROR = 'error';
    const TYPE_SUCCESS = 'success';

    static public function setFlashMessage(string $message, string $type)
    {
        if ($type !== self::TYPE_ERROR && $type !== self::TYPE_SUCCESS) {
            throw new \Exception('Wrong flash message type');
        }
        $_SESSION['flashMessage'] = ['message' => $message, 'type' => $type];
    }

    static public function getFlashMessage()
    {   
        $flashMessage = $_SESSION['flashMessage'];
        unset($_SESSION['flashMessage']);
        return $flashMessage;
    }
}
