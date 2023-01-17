<?php


namespace App\Models\Save;

use App\Models\Model;

/**
 * @property int $id
 * @property int $board_height
 * @property int $board_width
 */
class Save extends Model
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Save
     */
    public function setId(int $id): Save
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoardHeight(): int
    {
        return $this->board_height;
    }

    /**
     * @param int $board_height
     * @return Save
     */
    public function setBoardHeight(int $board_height): Save
    {
        $this->board_height = $board_height;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoardWidth(): int
    {
        return $this->board_width;
    }

    /**
     * @param int $board_width
     * @return Save
     */
    public function setBoardWidth(int $board_width): Save
    {
        $this->board_width = $board_width;
        return $this;
    }
}
