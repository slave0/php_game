<?php

namespace App\Http\Services\Player\Commands;

class Left extends MoveCommand
{
    protected function move()
    {
        $this->player->setPositionWidth($this->player->getPositionWidth() - 1);
    }

    protected function checkPosition(): bool
    {
        return $this->player->getPositionWidth() > 1;
    }
}
