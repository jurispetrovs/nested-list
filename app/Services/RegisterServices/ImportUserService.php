<?php

namespace App\Services\RegisterServices;

use App\Repositories\RegisterRepository;

class ImportUserService
{
    private RegisterRepository $registerRepository;

    public function __construct()
    {
        $this->registerRepository = new RegisterRepository();
    }

    public function execute(array $data): string
    {
        return $this->registerRepository->insert($data);

    }
}