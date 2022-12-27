<?php

namespace App\Models;

/**
 * @property int $id
 * @property string $type
 * @property int $hp
 * @property int $damage
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
}
