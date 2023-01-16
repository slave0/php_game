<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Player\Player;

class Down extends MoveCommand
{
    protected function move()
    {
        $this->entity->down();
    }

    protected function checkPosition(): bool
    {
        return !($this->entity->getPositionHeight() == $this->board->getHeight());
    }
}
