<?php

namespace App\Http\Services\Player\Commands;

use App\Entities\Board\Board;
use App\Http\Interfaces\Entity;

abstract class MoveCommand
{

    protected Entity $entity;
    protected Board $board;

    public function __construct(Entity $entity)
    {
        $this->board = Board::getInstance();
        $this->entity = $entity;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        if ($this->checkPosition()) {
            $this->move();
        }
    }

    abstract protected function move();

    abstract protected function checkPosition();

}
