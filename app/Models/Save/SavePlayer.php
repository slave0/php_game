<?php


namespace App\Models\Save;

use App\Models\Model;

/**
 * @property int $id
 * @property int $save_id
 * @property int $hp
 * @property int $level
 * @property int $exp
 * @property int $damage
 * @property string $state
 * @property int $position_width
 * @property int $position_height
 */
class SavePlayer extends Model
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SavePlayer
     */
    public function setId(int $id): SavePlayer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSaveId(): int
    {
        return $this->save_id;
    }

    /**
     * @param int $save_id
     * @return SavePlayer
     */
    public function setSaveId(int $save_id): SavePlayer
    {
        $this->save_id = $save_id;
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
     * @return SavePlayer
     */
    public function setHp(int $hp): SavePlayer
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
     * @return SavePlayer
     */
    public function setLevel(int $level): SavePlayer
    {
        $this->level = $level;
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
     * @return SavePlayer
     */
    public function setExp(int $exp): SavePlayer
    {
        $this->exp = $exp;
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
     * @return SavePlayer
     */
    public function setDamage(int $damage): SavePlayer
    {
        $this->damage = $damage;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return SavePlayer
     */
    public function setState(string $state): SavePlayer
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionWidth(): int
    {
        return $this->position_width;
    }

    /**
     * @param int $position_width
     * @return SavePlayer
     */
    public function setPositionWidth(int $position_width): SavePlayer
    {
        $this->position_width = $position_width;
        return $this;
    }

    /**
     * @return int
     */
    public function getPositionHeight(): int
    {
        return $this->position_height;
    }

    /**
     * @param int $position_height
     * @return SavePlayer
     */
    public function setPositionHeight(int $position_height): SavePlayer
    {
        $this->position_height = $position_height;
        return $this;
    }
}
