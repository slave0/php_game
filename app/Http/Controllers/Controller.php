<?php

namespace App\Http\Controllers;

use App\Entities\Player\Player;
use App\Http\Services\Save\SaveService;
use App\State\FullHp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(SaveService $service)
    {
        if (!$service->loadEntities())
        {
            $this->newGame(new SaveService());
        }
    }

    public function newGame(SaveService $service)
    {
        $player = Player::getInstance();
        $player->setHp(rand(10,40));
        $player->setWay([[1,1]]);
        $player->setLevel(1);
        $player->setDamage(10);
        $player->setState(new FullHp());
        $service->saveEntities();
    }
}
