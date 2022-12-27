<?php

namespace App\Http\Services\Player;

use App\Http\Services\Game\GameService;
use App\Http\Services\Game\SaveEntities;
use App\Http\Services\Player\Commands\Down;
use App\Http\Services\Player\Commands\Left;
use App\Http\Services\Player\Commands\MoveCommand;
use App\Http\Services\Player\Commands\Right;
use App\Http\Services\Player\Commands\Up;

class PlayerService
{
    const MOVE_LEFT = 'left';
    const MOVE_RIGHT = 'right';
    const MOVE_UP = 'up';
    const MOVE_DOWN = 'down';

    /**
     * @param $command
     * @return MoveCommand
     */
    public function getMoveCommand($command):MoveCommand
    {
        $cart = [
            self::MOVE_LEFT => new Left(),
            self::MOVE_RIGHT => new Right(),
            self::MOVE_UP => new Up(),
            self::MOVE_DOWN => new Down()
        ];

        return $cart[$command];
    }

    protected function move($command): void
    {
        GameService::index();
        $command = $this->getMoveCommand($command);
        $command->execute();
    }

    public function action($action, $command)
    {
        $this->{$action}($command);
        SaveEntities::execute();
    }


}
