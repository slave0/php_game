<?php

namespace App\Http\Services\Game;

use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ViewGameService
{
    /**
     * @return string
     */
    public static function getViewBoard(): string
    {
        $player = Player::getInstance();
        $board = \App\Entities\Board\Board::getInstance();
        $enemies = ListEnemies::getInstance()->getEnemies();

        return view('game/board', [
            'player' => $player,
            'board' => $board,
            'enemies' => $enemies
        ])->render();
    }

    /**
     * @return Factory|View|Application
     */
    public static function getViewGame(): Factory|View|Application
    {
        $player = Player::getInstance();
        $board = \App\Entities\Board\Board::getInstance();
        $enemies = ListEnemies::getInstance()->getEnemies();

        return view('game/index', [
            'player' => $player,
            'board' => $board,
            'enemies' => $enemies
        ]);
    }
}
