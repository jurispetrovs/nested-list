<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class EditSectionService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(string $id, array $data)
    {
        $this->sectionRepository->update($id, $data);
    }
}