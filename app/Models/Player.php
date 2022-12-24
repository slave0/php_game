<?php

namespace App\Models;

/**
 * @property int $hp
 * @property int $level
 * @property int $exp
 * @property int $damage
 * @property string $state
 */
class Player extends Model
{
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
}
