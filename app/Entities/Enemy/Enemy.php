<?php

namespace App\Entities\Enemy;

class Enemy
{
    const TYPE_OGR = 'Огр';
    const TYPE_MAG = 'Маг';
    const TYPE_PANGOLIN = 'Ящер';

    const ENEMY_HP = 10;

    const ENEMY_DAMAGE = 2;

    const TYPES_ENEMIES = [
        self::TYPE_OGR,
        self::TYPE_MAG,
        self::TYPE_PANGOLIN
    ];

    protected string $type;
    protected string $name;
    protected int $hp;
    protected int $damage;
    protected int $positionWidth;
    protected int $positionHeight;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Enemy
     */
    public function setName(string $name): Enemy
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
        return $this->positionWidth;
    }

    /**
     * @param int $positionWidth
     * @return Enemy
     */
    public function setPositionWidth(int $positionWidth): Enemy
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
     * @return Enemy
     */
    public function setPositionHeight(int $positionHeight): Enemy
    {
        $this->positionHeight = $positionHeight;
        return $this;
    }
}
