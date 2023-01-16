<?php

namespace App\Entities\Enemy;

use App\Http\Interfaces\Entity;

class Enemy implements Entity
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

    protected int $id;
    protected string $type;
    protected string $name;
    protected int $hp;
    protected int $damage;
    protected int $positionWidth;
    protected int $positionHeight;

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

    /**
     * @return void
     */
    public function up(): void
    {
        $this->setPositionHeight($this->getPositionHeight() - 1);
    }

    /**
     * @return void
     */
    public function left(): void
    {
        $this->setPositionWidth($this->getPositionWidth() - 1);
    }

    /**
     * @return void
     */
    public function right(): void
    {
        $this->setPositionWidth($this->getPositionWidth() + 1);
    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->setPositionHeight($this->getPositionHeight() + 1);
    }
}
