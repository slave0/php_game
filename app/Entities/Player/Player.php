<?php

namespace App\Entities\Player;

use App\Http\Interfaces\Entity;
use App\Http\Interfaces\Savatable;
use App\Http\Services\Memento\Memento;
use App\Http\Services\Memento\MementoPlayer;
use App\Traits\Singleton;

class Player implements Entity, Savatable
{
    use Singleton;

    const HP = 40;

    const DAMAGE = 3;

    const DEFAULT_WIDTH = 1;

    const DEFAULT_HEIGHT = 1;

    protected int $hp;
    protected int $level;
    protected mixed $damage;
    protected int $exp;
    protected int $positionWidth;
    protected int $positionHeight;

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
    public function getPositionWidth(): int
    {
        return $this->positionWidth;
    }

    /**
     * @param int $positionWidth
     * @return Player
     */
    public function setPositionWidth(int $positionWidth): Player
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
     * @return Player
     */
    public function setPositionHeight(int $positionHeight): Player
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

    public function save()
    {
        return new MementoPlayer($this);
    }

    public function load(Memento $memento)
    {
        $this->hp = $memento->getHp();
        $this->level = $memento->getLevel();
        $this->damage = $memento->getLevel();
        $this->exp = $memento->getExp();
        $this->positionWidth = $memento->getPositionWidth();
        $this->positionHeight = $memento->getPositionHeight();
    }
}
