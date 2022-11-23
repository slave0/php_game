<?php

namespace App\Http\Services\Memento;

use App\Entities\Enemy\Enemy;
use App\Entities\Entity;
use App\State\State;

class MementoEnemy implements Memento
{
    protected int $hp;
    protected int $row;
    protected int $column;
    protected State $state;
    protected int $damage;

    public function __construct(Enemy|Entity $enemy)
    {
        $this->hp = $enemy->getHp();
        $this->row = $enemy->getRow();
        $this->column = $enemy->getColumn();
        $this->state = $enemy->getState();
        $this->damage = $enemy->getDamage();
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @return int
     */
    public function getRow(): int
    {
        return $this->row;
    }

    /**
     * @param int $row
     * @return MementoEnemy
     */
    public function setRow(int $row): MementoEnemy
    {
        $this->row = $row;
        return $this;
    }

    /**
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }

    /**
     * @param int $column
     * @return MementoEnemy
     */
    public function setColumn(int $column): MementoEnemy
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }
}
