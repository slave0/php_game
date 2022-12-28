<?php

namespace App\Http\Controllers;

use App\Entities\Board\Board;
use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;
use App\Http\Services\Game\GameService;
use App\Http\Services\Game\NewGame;
use App\Http\Services\Game\ViewGameService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GameController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('game/start');
    }

    /**
     * @param NewGame $game
     * @param GameService $service
     * @return View|Factory|Application
     */
    public function start(NewGame $game, GameService $service): View|Factory|Application
    {
        return ViewGameService::getViewGame();
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
