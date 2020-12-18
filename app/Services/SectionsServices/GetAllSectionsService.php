<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class GetAllSectionsService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(string $userId)
    {
        return $this->sectionRepository->getAllByUserId($userId);
    }
}