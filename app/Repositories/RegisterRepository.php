<?php

namespace App\Repositories;

use App\Bootstrap\Database;
use Ramsey\Uuid\Uuid;

class RegisterRepository
{
    private Database $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getByEmail(string $email)
    {
        return $this->connection
            ->query()
            ->select('*')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $email)
            ->execute()
            ->fetchAssociative();
    }

    public function insert(array $data): string
    {
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $id = Uuid::uuid4()->toString();

        $this->connection
            ->query()
            ->insert('users')
            ->values([
                'id' => ':id',
                'name' => ':name',
                'email' => ':email',
                'password' => ':password',
            ])
            ->setParameters([
                'id' => $id,
                'name' => $data['firstname'],
                'email' => $data['email'],
                'password' => $password,
            ])
            ->execute();

        return $data['email'];
    }
}