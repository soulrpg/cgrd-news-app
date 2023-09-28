<?php

namespace Soulrpg\CgrdNewsApp\Utility;

class LoginCheck
{
    static public function checkIfLoggedIn(): void
    {
        if (!array_key_exists('loggedIn', $_SESSION)) {
            FlashMessageUtility::setFlashMessage('Not logged in!', FlashMessageUtility::TYPE_ERROR);
            header('Location: /', true, 303);
            die();
        }
    }
}
