<?php

namespace App\Http\Services\Player\Commands;

class Up extends MoveCommand
{
    protected function move()
    {
        $this->player->setPositionHeight($this->player->getPositionHeight() - 1);
    }

    protected function checkPosition(): bool
    {
        return $this->player->getPositionHeight() > 1;
    }
}
