<?php

namespace App\Http\Services\Memento;

use App\Entities\Entity;
use App\Entities\Player\Player;
use App\State\State;

class MementoBoard implements Memento
{


    public function __construct(Entity|Player $player)
    {

    }

}
