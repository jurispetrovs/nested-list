<?php

namespace App\Services\LoginServices;

use App\Repositories\LoginRepository;

class PasswordValidationService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository();
    }

    public function execute(string $email, string $password): string
    {
        $user = $this->loginRepository->getUserByEmail($email);

        if(isset($user))
        {
            if (password_verify($password, $user->password())) {
                return "true";
            }
        }

        return "false";
    }
}