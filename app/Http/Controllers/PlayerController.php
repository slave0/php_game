<?php

namespace App\Http\Controllers;

use App\Http\Requests\Player\ActionRequest;
use App\Http\Services\Player\PlayerService;

class PlayerController extends Controller
{
    /**
     * @param ActionRequest $request
     * @param PlayerService $service
     * @return string
     */
    public function move(ActionRequest $request, PlayerService $service): string
    {
        return $service->action(__FUNCTION__, $request->getAction());
    }
}
