<?php

namespace App\Http\Services\Memento;

use App\Entities\Entity;
use App\Entities\Player\Player;
use App\State\State;

class MementoPlayer implements Memento
{
    protected int $hp;
    protected int $level;
    protected ?array $way;
    protected State $state;
    protected float|int $damage;

    public function __construct(Entity|Player $player)
    {
        $this->hp = $player->getHp();
        $this->level = $player->getLevel();
        $this->way = $player->getWay();
        $this->state = $player->getState();
        $this->damage = $player->getDamage();
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
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return array|null
     */
    public function getWay(): ?array
    {
        return $this->way;
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getDamage(): mixed
    {
        return $this->damage;
    }
}
