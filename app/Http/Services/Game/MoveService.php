<?php

namespace App\Http\Services\Game;

use App\Http\Interfaces\Entity;
use App\Http\Services\Player\Commands\Down;
use App\Http\Services\Player\Commands\Left;
use App\Http\Services\Player\Commands\MoveCommand;
use App\Http\Services\Player\Commands\Right;
use App\Http\Services\Player\Commands\Up;

class MoveService
{
    const MOVE_LEFT = 'left';
    const MOVE_RIGHT = 'right';
    const MOVE_UP = 'up';
    const MOVE_DOWN = 'down';

    /**
     * Паттерн команда
     *
     * @param $command
     * @param Entity $entity
     * @return MoveCommand
     */
    public static function getMoveCommand($command, Entity $entity):MoveCommand
    {
        $cart = [
            self::MOVE_LEFT => new Left($entity),
            self::MOVE_RIGHT => new Right($entity),
            self::MOVE_UP => new Up($entity),
            self::MOVE_DOWN => new Down($entity)
        ];

        return $cart[$command];
    }
}
