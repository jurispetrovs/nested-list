<?php

namespace App\Models;

class Section
{
    private string $id;
    private string $userId;
    private string $name;
    private string $description;
    private ?string $parentId;

    public function __construct(
        string $id,
        string $userId,
        string $name,
        string $description,
        ?string $parentId
    )
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->name = $name;
        $this->description = $description;
        $this->parentId = $parentId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function parentId(): ?string
    {
        return $this->parentId;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['name'],
            $data['description'],
            $data['parent_id']
        );
    }
}