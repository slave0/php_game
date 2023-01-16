<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Board\Board;

class Left extends MoveCommand
{
    protected function move()
    {
        $this->entity->left();
    }

    protected function checkPosition(): bool
    {
        return $this->entity->getPositionWidth() > Board::MINIMUM_COORDINATE;
    }
}
