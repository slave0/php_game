<?php

namespace App\Entities\Enemy;

class Enemy
{
    protected string $type;
    protected string $name;
    protected int $hp;
    protected int $damage;

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
}
