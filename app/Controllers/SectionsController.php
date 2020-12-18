<?php

namespace App\Controllers;

use App\Services\SectionsServices\DeleteSectionService;
use App\Services\SectionsServices\EditSectionService;
use App\Services\SectionsServices\GetAllSectionsService;
use App\Services\SectionsServices\GetChildSectionsService;
use App\Services\SectionsServices\GetSectionService;
use App\Services\SectionsServices\ImportSectionService;

class SectionsController
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['auth'])) {
            $userId = $_SESSION['auth']->id();

            $sections = (new GetAllSectionsService())->execute($userId);
        }

        require_once __DIR__ . '/../../resources/views/index.view.php';
    }

    public function show(array $vars)
    {
        session_start();

        if (!isset($_SESSION['auth'])) {
            header('Location: /');
        }

        $parentId = (string)$vars['id'];
        $userId = $_SESSION['auth']->id();

        $section = (new GetSectionService())->execute($parentId);
        $sections = (new GetChildSectionsService())->execute($parentId, $userId);

        if ($userId != $section->userId()) {
            header('Location: /');
        }

        require_once __DIR__ . '/../../resources/views/section/show.view.php';

    }

    public function create()
    {
        session_start();

        if (!isset($_SESSION['auth'])) {
            header('Location: /');
        }

        $userId = $_SESSION['auth']->id();

        if (isset($_GET['parent_id'])) {
            $parentId = $_GET['parent_id'];

            $section = (new GetSectionService())->execute($parentId);

            if ($userId != $section->userId()) {
                header('Location: /');
            }
        }

        require_once __DIR__ . '/../../resources/views/section/create.view.php';
    }

    public function store(array $vars)
    {
        session_start();

        $data = $_POST;

        $userId = $_SESSION['auth']->id();

        if (!isset($data['parent_id'])) {
            $data['parent_id'] = null;
        }

        (new ImportSectionService())->execute($data, $userId);

        header('Location: /');
    }

    public function delete(array $vars)
    {
        $id = (string)$vars['id'];

        $path = $_POST['path'];

        (new DeleteSectionService())->execute($id, $path);

        header('Location: /');
    }

    public function edit(array $vars)
    {
        session_start();

        if (!isset($_SESSION['auth'])) {
            header('Location: /');
        }

        $id = (string)$vars['id'];
        $userId = $_SESSION['auth']->id();

        $section = (new GetSectionService())->execute($id);

        if ($userId != $section->userId()) {
            header('Location: /');
        }

        require_once __DIR__ . '/../../resources/views/section/edit.view.php';
    }

    public function update(array $vars)
    {
        $id = (string)$vars['id'];

        $data = $_POST;

        (new EditSectionService())->execute($id, $data);

        header('Location: /');
    }
}