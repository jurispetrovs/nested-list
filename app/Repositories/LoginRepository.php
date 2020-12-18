<?php

namespace App\Repositories;

use App\Bootstrap\Database;
use App\Models\User;

class LoginRepository
{
    private Database $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getUserByEmail(string $email): ?User
    {
        $data = $this->connection
            ->query()
            ->select('*')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $email)
            ->execute()
            ->fetchAssociative();

        if ($data) {
            return User::create($data);
        }

        return null;
    }
}