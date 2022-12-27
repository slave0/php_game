<?php

namespace App\Http\Services\Player\Commands;

class Right extends MoveCommand
{
    protected function move()
    {
        $this->player->setPositionWidth($this->player->getPositionWidth() + 1);
    }

    protected function checkPosition(): bool
    {
        return !($this->player->getPositionWidth() == $this->board->getWidth());
    }
}
