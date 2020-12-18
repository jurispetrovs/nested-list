<?php

namespace App\Controllers;

use App\Services\LoginServices\GetUserService;
use App\Services\RegisterServices\EmailValidationService;
use App\Services\RegisterServices\ImportUserService;

class RegisterController
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['auth'])) {
            header('Location: /');
        }

        require_once __DIR__ . '/../../resources/views/authentication/register.view.php';
    }

    public function store()
    {
        $data = $_POST;

        $email = (new ImportUserService())->execute($data);
        $user = (new GetUserService())->execute($email);

        session_start();
        $_SESSION['auth'] = $user;

        header('Location: /');
    }

    public function emailValidation(): void
    {
        $email = $_POST['email'];

        echo (new EmailValidationService())->execute($email);
    }
}