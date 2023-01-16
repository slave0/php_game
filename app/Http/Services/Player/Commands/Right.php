<?php

namespace App\Http\Services\Player\Commands;

class Right extends MoveCommand
{
    protected function move()
    {
        $this->entity->right();
    }

    protected function checkPosition(): bool
    {
        return !($this->entity->getPositionWidth() == $this->board->getWidth());
    }
}
