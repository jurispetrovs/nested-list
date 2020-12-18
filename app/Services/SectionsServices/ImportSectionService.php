<?php

namespace App\Services\SectionsServices;

use App\Repositories\SectionRepository;

class ImportSectionService
{
    private SectionRepository $sectionRepository;

    public function __construct()
    {
        $this->sectionRepository = new SectionRepository();
    }

    public function execute(array $data, string $userId)
    {
        if(!isset($data['path'])) {
            $data['path'] = null;
        }

        $this->sectionRepository->insert($data, $userId);
    }
}