<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Board\Board;
use App\Entities\Player\Player;

abstract class MoveCommand
{

    protected Player $player;
    protected Board $board;

    public function __construct()
    {
        $this->board = Board::getInstance();
        $this->player = Player::getInstance();
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        if ($this->checkPosition()) {
            $this->move();
        }
    }

    abstract protected function move();

    abstract protected function checkPosition();

}
