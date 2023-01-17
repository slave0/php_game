<?php


namespace App\Models\Save;

use App\Models\Model;

/**
 * @property int $id
 * @property int $save_id
 * @property int $hp
 * @property int $damage
 * @property string type
 * @property int $position_width
 * @property int $position_height
 */
class SaveEnemy extends Model
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
     * @return SaveEnemy
     */
    public function setId(int $id): SaveEnemy
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
     * @return SaveEnemy
     */
    public function setSaveId(int $save_id): SaveEnemy
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
     * @return SaveEnemy
     */
    public function setHp(int $hp): SaveEnemy
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
     * @return SaveEnemy
     */
    public function setDamage(int $damage): SaveEnemy
    {
        $this->damage = $damage;
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
     * @return SaveEnemy
     */
    public function setType(string $type): SaveEnemy
    {
        $this->type = $type;
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
     * @return SaveEnemy
     */
    public function setPositionWidth(int $position_width): SaveEnemy
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
     * @return SaveEnemy
     */
    public function setPositionHeight(int $position_height): SaveEnemy
    {
        $this->position_height = $position_height;
        return $this;
    }
}
