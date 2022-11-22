<?php

namespace App\Http\Controllers;

use App\Entities\Player\Player;
use App\Handler\Fright;
use App\Handler\Hit;
use App\Handler\Runaway;
use App\Handler\Stan;
use App\Http\Services\Save\SaveService;
use App\State\Berserk;
use App\State\FullHp;
use App\State\LowHp;
use App\State\Tired;


class GameController extends Controller
{
    public function index()
    {
        $player = Player::getInstance();

        $way = $player->getWay();
        $way = last($way);

        return view('welcome', [
            'playerPosition' => $way,
            'row' => 8,
            'column' => 8
        ]);
    }


    public function start(SaveService $service)
    {
        return 'Главный герой '. $service->loadEntities();
    }



    public function save(SaveService $service)
    {
        return $service->save();
    }

    public function listSave(SaveService $service)
    {
        $service->listSave();
    }

    public function load(int $id, SaveService $service)
    {

        $service->load($id);
    }

    public function state(string $state, SaveService $service)
    {
        $player = Player::getInstance();

        match ($state) {
            'berserk' => $player->setState(new Berserk()),
            'fullHp' => $player->setState(new FullHp()),
            'lowHp' => $player->setState(new LowHp()),
            'tired' => $player->setState(new Tired()),
        };

        $service->saveEntities();

    }



    public function enemy(): string
    {
        $player = Player::getInstance();
        $stan = new Stan();
        $stan->setNext( new Fright())->setNext(new Runaway())->setNext(new Hit());
        return $stan->handle( $player->getState());
    }

}
