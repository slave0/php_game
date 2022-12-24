<?php

namespace App\Models;

/**
 * @property int $height
 * @property int $weight
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
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return Board
     */
    public function setWeight(int $weight): Board
    {
        $this->weight = $weight;
        return $this;
    }
}
