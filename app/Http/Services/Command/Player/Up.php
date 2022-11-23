<?php

namespace App\Http\Services\Command\Player;

use App\Entities\Player\Player;
use App\Http\Services\Command\Command;

class Up implements Command
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function execute()
    {
        $this->player->up();
    }

    public function undo()
    {
        $this->player->down();
    }

    public function redo()
    {
        $this->execute();
    }
}
