<?php

namespace App\Models;

/**
 * @property int $height
 * @property int $width
 */
class Board extends Model
{
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
}
