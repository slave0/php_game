<?php

namespace App\Http\Services\Memento;



use App\Entities\Board\Board;
use App\Http\Interfaces\Entity;

class MementoPlayer implements Memento
{
    protected int $hp;
    protected int $level;
    protected mixed $damage;
    protected int $exp;
    protected int $positionWidth;
    protected int $positionHeight;

    /**
     * MementoPlayer constructor.
     * @param Entity|Board $player
     */
    public function __construct(Entity|Board $player)
    {
        $this->hp = $player->getHp();
        $this->level = $player->getLevel();
        $this->damage = $player->getLevel();
        $this->exp = $player->getExp();
        $this->positionWidth = $player->getPositionWidth();
        $this->positionHeight = $player->getPositionHeight();
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
     * @return MementoPlayer
     */
    public function setHp(int $hp): MementoPlayer
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
     * @return MementoPlayer
     */
    public function setLevel(int $level): MementoPlayer
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDamage(): mixed
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     * @return MementoPlayer
     */
    public function setDamage(mixed $damage): MementoPlayer
    {
        $this->damage = $damage;
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
     * @return MementoPlayer
     */
    public function setExp(int $exp): MementoPlayer
    {
        $this->exp = $exp;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionWidth(): int
    {
        return $this->positionWidth;
    }

    /**
     * @param int $positionWidth
     * @return MementoPlayer
     */
    public function setPositionWidth(int $positionWidth): MementoPlayer
    {
        $this->positionWidth = $positionWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionHeight(): int
    {
        return $this->positionHeight;
    }

    /**
     * @param int $positionHeight
     * @return MementoPlayer
     */
    public function setPositionHeight(int $positionHeight): MementoPlayer
    {
        $this->positionHeight = $positionHeight;
        return $this;
    }
}
