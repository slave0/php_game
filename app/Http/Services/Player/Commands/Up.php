<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Board\Board;

class Up extends MoveCommand
{
    protected function move()
    {
        $this->entity->up();
    }

    protected function checkPosition(): bool
    {
        return $this->entity->getPositionHeight() > Board::MINIMUM_COORDINATE;
    }
}
