<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class GetChildSectionsService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(string $parentId, string $userId)
    {
        return $this->sectionRepository->getAllByParentId($parentId, $userId);
    }
}