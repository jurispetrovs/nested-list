<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class GetSectionService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(string $id)
    {
        return $this->sectionRepository->getById($id);
    }
}