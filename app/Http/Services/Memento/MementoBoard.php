<?php

namespace App\Http\Services\Memento;

use App\Entities\Board\Board;
use App\Http\Interfaces\Entity;


class MementoBoard implements Memento
{
    protected int $width;
    protected int $height;

    /**
     * MementoBoard constructor.
     * @param Entity|Board $board
     */
    public function __construct(Entity|Board $board)
    {
        $this->width = $board->getWidth();
        $this->height = $board->getHeight();
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return MementoBoard
     */
    public function setWidth(int $width): MementoBoard
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return MementoBoard
     */
    public function setHeight(int $height): MementoBoard
    {
        $this->height = $height;
        return $this;
    }
}
