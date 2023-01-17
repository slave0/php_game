<?php

namespace App\Entities\Board;

use App\Http\Interfaces\Savatable;
use App\Http\Services\Memento\Memento;
use App\Http\Services\Memento\MementoBoard;
use App\Traits\Singleton;

class Board implements Savatable
{
    use Singleton;

    public const MINIMUM_COORDINATE = 1;

    protected int $width;
    protected int $height;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Board
     */
    public function setWidth(int $width): Board
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
     * @return Board
     */
    public function setHeight(int $height): Board
    {
        $this->height = $height;
        return $this;
    }

    public function save()
    {
        return new MementoBoard($this);
    }

    public function load(Memento $memento)
    {
        $this->height = $memento->getHeight();
        $this->width = $memento->getWidth();
    }
}
