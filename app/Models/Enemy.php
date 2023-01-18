<?php

namespace App\Models;

/**
 * @property int $id
 * @property string $type
 * @property int $hp
 * @property int $damage
 * @property int $position_width
 * @property int $position_height
 * @property-read BoardPosition $boardPosition
 */
class Enemy extends Model
{
    public function boardPosition()
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
     * @return Enemy
     */
    public function setId(int $id): Enemy
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Enemy
     */
    public function setType(string $type): Enemy
    {
        $this->type = $type;
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
     * @return Enemy
     */
    public function setHp(int $hp): Enemy
    {
        $this->hp = $hp;
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
     * @return Enemy
     */
    public function setDamage(int $damage): Enemy
    {
        $this->damage = $damage;
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
     * @return Enemy
     */
    public function setPositionWidth(int $position_width): Enemy
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
     * @return Enemy
     */
    public function setPositionHeight(int $position_height): Enemy
    {
        $this->position_height = $position_height;
        return $this;
    }
}
