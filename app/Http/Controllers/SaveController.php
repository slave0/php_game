<?php


namespace App\Http\Controllers;


use App\Http\Services\Save\SaveService;

class SaveController extends Controller
{
    public function save(SaveService $service)
    {
        return $service->saveEntities();
    }

    public function getSaves(SaveService $service)
    {
        return $service->listSaves();
    }

    public function load(int $saveId, SaveService $service)
    {
        return $service->load($saveId);
    }
}
