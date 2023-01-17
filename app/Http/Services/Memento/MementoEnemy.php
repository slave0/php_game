<?php

namespace App\Http\Services\Memento;

use App\Entities\Board\Board;
use App\Http\Interfaces\Entity;


class MementoEnemy implements Memento
{
    protected int $id;

    protected string $type;

    protected string $name;

    protected int $hp;

    protected int $damage;

    protected int $positionWidth;

    protected int $positionHeight;

    public function __construct(Entity|Board $enemy)
    {
        $this->id = $enemy->getId();
        $this->type = $enemy->getType();
        $this->name = $enemy->getName();
        $this->hp = $enemy->getHp();
        $this->damage = $enemy->getDamage();
        $this->positionWidth = $enemy->getPositionWidth();
        $this->positionHeight = $enemy->getPositionHeight();
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
     * @return MementoEnemy
     */
    public function setId(int $id): MementoEnemy
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
     * @return MementoEnemy
     */
    public function setType(string $type): MementoEnemy
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MementoEnemy
     */
    public function setName(string $name): MementoEnemy
    {
        $this->name = $name;
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
     * @return MementoEnemy
     */
    public function setHp(int $hp): MementoEnemy
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
     * @return MementoEnemy
     */
    public function setDamage(int $damage): MementoEnemy
    {
        $this->damage = $damage;
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
     * @return MementoEnemy
     */
    public function setPositionWidth(int $positionWidth): MementoEnemy
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
     * @return MementoEnemy
     */
    public function setPositionHeight(int $positionHeight): MementoEnemy
    {
        $this->positionHeight = $positionHeight;
        return $this;
    }
}
