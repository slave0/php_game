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

    public function __construct(SaveService $service)
    {
        if (!$service->loadEntities())
        {
            $player = Player::getInstance();
            $player->setHp(rand(10,40));
            $player->setWay(null);
            $player->setLevel(1);
            $player->setDamage(10);
            $player->setState(new LowHp());
            $service->saveEntities();
        }
    }

    public function start(SaveService $service)
    {
        return 'Главный герой '. $service->loadEntities();
    }

    public function newGame(SaveService $service)
    {
        $player = Player::getInstance();
        $player->setHp(rand(10,40));
        $player->setWay(null);
        $player->setLevel(1);
        $player->setDamage(10);
        $player->setState(new LowHp());
        $service->saveEntities();
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

    public function index()
    {
        $player = Player::getInstance();
        return 'level: ' . $player->getLevel() . ' hp: '. $player->getHp();
    }

    public function enemy(): string
    {
        $player = Player::getInstance();
        $stan = new Stan();
        $stan->setNext( new Fright())->setNext(new Runaway())->setNext(new Hit());
        return $stan->handle( $player);
    }

}
