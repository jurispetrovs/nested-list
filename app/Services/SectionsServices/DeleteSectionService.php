<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class DeleteSectionService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(string $id, string $path)
    {
        $this->sectionRepository->delete($path);
    }
}