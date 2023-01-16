<?php

namespace App\Http\Services\Enemy;

use App\Entities\Board\Board;
use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;

abstract class EnemiesAction
{
    protected array $enemies;
    protected Board $board;
    protected Player $player;

    public function __construct()
    {
        $this->enemies = ListEnemies::getInstance()->getEnemies();
        $this->player = Player::getInstance();
        $this->board = Board::getInstance();
    }
    abstract public function execute();
}
