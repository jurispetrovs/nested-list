<?php

namespace App\Services\LoginServices;

use App\Repositories\LoginRepository;

class EmailValidationService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository();
    }

    public function execute(string $email): string
    {
        $response = $this->loginRepository->getUserByEmail($email);

        if ($response) {
            return "true";
        }

        return "false";
    }
}