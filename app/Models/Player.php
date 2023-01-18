<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int $id
 * @property int $hp
 * @property int $level
 * @property int $exp
 * @property int $damage
 * @property string $state
 * @property int $position_width
 * @property int $position_height
 * @property-read BoardPosition $boardPosition
 */
class Player extends Model
{
    public function boardPosition(): MorphOne
    {
        return $this->morphOne(BoardPosition::class, 'entity');
    }

    /**
     * @return BoardPosition
     */
    public function getBoardPosition(): BoardPosition
    {
        return $this->boardPosition;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Player
     */
    public function setId(int $id): Player
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     * @return Player
     */
    public function setHp(int $hp): Player
    {
        $this->hp = $hp;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return Player
     */
    public function setLevel(int $level): Player
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getExp(): int
    {
        return $this->exp;
    }

    /**
     * @param int $exp
     * @return Player
     */
    public function setExp(int $exp): Player
    {
        $this->exp = $exp;
        return $this;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     * @return Player
     */
    public function setDamage(int $damage): Player
    {
        $this->damage = $damage;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Player
     */
    public function setState(string $state): Player
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionWidth(): int
    {
        return $this->position_width;
    }

    /**
     * @param int $position_width
     * @return Player
     */
    public function setPositionWidth(int $position_width): Player
    {
        $this->position_width = $position_width;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionHeight(): int
    {
        return $this->position_height;
    }

    /**
     * @param int $position_height
     * @return Player
     */
    public function setPositionHeight(int $position_height): Player
    {
        $this->position_height = $position_height;
        return $this;
    }
}
