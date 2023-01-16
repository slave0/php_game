<?php

namespace App\Http\Services\Player;

use App\Entities\Player\Player;
use App\Http\Services\Game\GameService;
use App\Http\Services\Game\MoveService;
use App\Http\Services\Game\SaveEntities;
use App\Http\Services\Game\ViewGameService;

class PlayerService
{
    /**
     * @param $command
     * @return void
     */
    protected function move($command): void
    {
        GameService::index();
        $command = MoveService::getMoveCommand($command, Player::getInstance());
        $command->execute();
    }

    /**
     * @param $action
     * @param $command
     * @return string
     */
    public function action($action, $command): string
    {
        $this->{$action}($command);
        SaveEntities::execute();
        return ViewGameService::getViewBoard();
    }


}
