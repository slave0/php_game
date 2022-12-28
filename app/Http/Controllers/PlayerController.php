<?php

namespace App\Http\Controllers;

use App\Http\Requests\Player\ActionRequest;
use App\Http\Services\Player\PlayerService;

class PlayerController extends Controller
{
    public function move(ActionRequest $request, PlayerService $service)
    {
        return $service->action(__FUNCTION__, $request->getAction());
    }
}
