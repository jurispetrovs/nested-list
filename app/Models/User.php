<?php

namespace App\Models;

class User
{
    private string $name;
    private string $email;
    private string $password;
    private string $id;

    public function __construct(
        string $name,
        string $email,
        string $password,
        string $id
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function id(): string
    {
        return $this->id;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['id']
        );
    }
}