<?php

namespace App\Http\Services\Command\Player;

use App\Entities\Player\Player;
use App\Http\Services\Command\Command;

class Left implements Command
{
    protected $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function execute()
    {
        $this->player->left();
    }

    public function undo()
    {
        $this->player->right();
    }

    public function redo()
    {
        $this->execute();
    }
}
