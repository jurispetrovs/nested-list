<?php

namespace App\Repositories;

use App\Bootstrap\Database;
use App\Models\Section;

class SectionRepository
{
    private Database $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getAllByUserId(string $id): array
    {
        $data = $this->connection
            ->query()
            ->select('*')
            ->from('sections')
            ->where('user_id = :user_id')
            ->andWhere('parent_id is NULL')
            ->setParameter('user_id', $id)
            ->orderBy('created_at', 'ASC')
            ->execute()
            ->fetchAllAssociative();

        $sections = [];

        foreach ($data as $section) {
            $sections[] = Section::create($section);
        }

        return $sections;
    }

    public function getAllByParentId(string $parentId, string $userId): array
    {
        $data = $this->connection
            ->query()
            ->select('*')
            ->from('sections')
            ->where('user_id = :user_id')
            ->andWhere('parent_id = :parent_id')
            ->setParameters([
                'user_id' => $userId,
                'parent_id' => $parentId
            ])
            ->orderBy('created_at', 'ASC')
            ->execute()
            ->fetchAllAssociative();

        $sections = [];

        foreach ($data as $section) {
            $sections[] = Section::create($section);
        }

        return $sections;
    }

    public function getById(string $id)
    {
        $data = $this->connection
            ->query()
            ->select('*')
            ->from('sections')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();

        return Section::create($data);
    }

    public function insert(array $data, string $userId): void
    {
        $this->connection
            ->query()
            ->insert('sections')
            ->values([
                'user_id' => ':userId',
                'name' => ':name',
                'description' => ':description',
                'parent_id' => ':parentId',
                'path' => ':path'
            ])
            ->setParameters([
                'userId' => $userId,
                'name' => $data['name'],
                'description' => $data['description'],
                'parentId' => $data['parent_id'],
                'path' => $data['path']
            ])
            ->execute();

        $id = $this->lastInsertId();
        $this->updatePath($id);
    }

    public function updatePath(string $id)
    {
        $section = $this->getById($id);

        if ($section->path() === null) {
            $path = $id;
        } else {
            $path = $section->path() . '.' . $id;
        }

        $this->connection
            ->query()
            ->update('sections')
            ->set('path', ':path')
            ->setParameter('path', $path)
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }

    public function lastInsertId(): string
    {
        $data = $this->connection
            ->query()
            ->select('max(id)')
            ->from('sections')
            ->execute()
            ->fetchAssociative();

        return $data['max(id)'];
    }

    public function update(string $id, array $data): void
    {
        $this->connection
            ->query()
            ->update('sections')
            ->set('name', ':name')
            ->set('description', ':description')
            ->setParameters([
                'name' => $data['name'],
                'description' => $data['description']
            ])
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();
    }

    public function delete(string $path)
    {
        $this->connection
            ->query()
            ->delete('sections')
            ->where('path LIKE :path')
            ->setParameter('path', $path . '%')
            ->execute();
    }
}