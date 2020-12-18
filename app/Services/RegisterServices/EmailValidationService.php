<?php

namespace App\Services\RegisterServices;

use App\Repositories\RegisterRepository;

class EmailValidationService
{
    private RegisterRepository $registerRepository;

    public function __construct()
    {
        $this->registerRepository = new RegisterRepository;
    }

    public function execute(string $email): string
    {
        $response = $this->registerRepository->getByEmail($email);

        if ($response) {
            return "false";
        }

        return "true";
    }
}