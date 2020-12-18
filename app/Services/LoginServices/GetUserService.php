<?php

namespace App\Services\LoginServices;

use App\Models\User;
use App\Repositories\LoginRepository;

class GetUserService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository();
    }

    public function execute(string $email): ?User
    {
        return $this->loginRepository->getUserByEmail($email);
    }
}