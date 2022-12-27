<?php

namespace App\Http\Controllers;

use App\Entities\Board\Board;
use App\Entities\Player\Player;
use App\Http\Services\Game\GameService;
use App\Http\Services\Game\NewGame;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GameController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('game/start');
    }
    public function start(NewGame $game, GameService $service)
    {
        $player = Player::getInstance();
        $board = Board::getInstance();
        $enemies = $service->getEnemies();

        return view('game/board', [
            'player' => $player,
            'board' => $board,
            'enemies' => $enemies
        ]);
    }

    public function save()
    {

    }

    public function getSaves()
    {

    }

    public function load()
    {

    }
}
