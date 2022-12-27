<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Player\Player;

class Down extends MoveCommand
{
    protected function move()
    {
        $this->player->setPositionHeight($this->player->getPositionHeight() + 1);
    }

    protected function checkPosition(): bool
    {
        return !($this->player->getPositionHeight() == $this->board->getHeight());
    }
}
