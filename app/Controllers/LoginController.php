<?php

namespace App\Controllers;

use App\Services\LoginServices\EmailValidationService;
use App\Services\LoginServices\GetUserService;
use App\Services\LoginServices\PasswordValidationService;

class LoginController
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['auth'])) {
            header('Location: /');
        }

        require_once __DIR__ . '/../../resources/views/authentication/login.view.php';
    }

    public function login()
    {
        $email = $_POST['email'];

        $user = (new GetUserService())->execute($email);

        session_start();
        $_SESSION['auth'] = $user;

        header('Location: /');
    }

    public function emailValidation()
    {
        $email = $_POST['email'];

        echo (new EmailValidationService())->execute($email);
    }

    public function passwordValidation()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo (new PasswordValidationService())->execute($email, $password);
    }

    public function logout()
    {
        session_start();
        session_unset();

        header('Location: /');
    }
}