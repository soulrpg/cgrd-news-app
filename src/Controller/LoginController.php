<?php

declare(strict_types=1);

namespace Soulrpg\CgrdNewsApp\Controller;

use Soulrpg\CgrdNewsApp\Utility\DbConnection;
use Soulrpg\CgrdNewsApp\Utility\FlashMessageUtility;

class LoginController
{
    public function login(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $conn = DbConnection::getDatabaseConnection();
        $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedIn'] = true;
        } else {
            FlashMessageUtility::setFlashMessage('Wrong Login Data!', FlashMessageUtility::TYPE_ERROR);
        }
        header('Location: /', true, 303);
        die();
    }

    public function logout(): void
    {
        unset($_SESSION['loggedIn']);
        header('Location: /', true, 303);
        die();
    }
}