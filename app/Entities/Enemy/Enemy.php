<?php

namespace App\Entities\Enemy;

use App\Entities\Entity;
use App\Http\Services\Memento\Memento;
use App\Http\Services\Memento\MementoEnemy;
use App\State\State;

abstract class Enemy implements Entity
{
    /**
     * @var State
     */
    private State $state;

    /**
     * @var int
     */
    private int $hp;

    /**
     * @var int
     */
    private int $row;

    /**
     * @var int
     */
    private int $column;

    /**
     * @var int
     */
    private int $damage;

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     * @return Enemy
     */
    public function setState(State $state): Enemy
    {
        $this->state = $state;
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
    public function getRow(): int
    {
        return $this->row;
    }

    /**
     * @param int $row
     * @return Enemy
     */
    public function setRow(int $row): Enemy
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
     * @return Enemy
     */
    public function setColumn(int $column): Enemy
    {
        $this->column = $column;
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

    public function hit()
    {
        return $this->state->hit($this->damage);
    }

    public function save(): Memento
    {
        return new MementoEnemy($this);
    }

    public function load(Memento|MementoEnemy $memento): void
    {
        $this->row = $memento->getRow();
        $this->column = $memento->getColumn();
        $this->state = $memento->getState();
        $this->damage = $memento->getDamage();
        $this->hp = $memento->getHp();
    }
}
