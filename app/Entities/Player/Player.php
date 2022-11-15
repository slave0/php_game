<?php

namespace App\Entities\Player;

use App\Http\Services\Memento;
use App\State\State;
use App\Traits\Singleton;

class Player
{
    use Singleton;

    protected int $hp;
    protected ?array $way;
    protected int $level;
    protected mixed $damage;
    protected State $state;

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
     * @return array|null
     */
    public function getWay(): ?array
    {
        return $this->way;
    }

    /**
     * @param array|null $way
     * @return Player
     */
    public function setWay(?array $way): Player
    {
        $this->way = $way;
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
     * @return mixed
     */
    public function getDamage(): mixed
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     * @return Player
     */
    public function setDamage(mixed $damage): Player
    {
        $this->damage = $damage;
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
     * @param State $state
     * @return Player
     */
    public function setState(State $state): Player
    {
        $this->state = $state;
        return $this;
    }

    public function save(): Memento
    {
        return new Memento($this);
    }

    public function load(Memento $mementoPlayer): void
    {
        $this->hp = $mementoPlayer->getHp();
        $this->way = $mementoPlayer->getWay();
        $this->level = $mementoPlayer->getLevel();
        $this->damage = $mementoPlayer->getDamage();
        $this->state = $mementoPlayer->getState();
    }

    public function hit()
    {
        return $this->state->hit($this->damage);
    }

    public function run()
    {
        return $this->state->run();
    }
}
