<?php


namespace App\Models\Save;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $game_save_id
 * @property int $hp
 * @property int $level
 * @property int $exp
 * @property int $damage
 * @property string $state
 * @property int $position_width
 * @property int $position_height
 * @property-read GameSave $gameSave
 */
class PlayerSave extends Model
{

    public function saveGame(): BelongsTo
    {
        return $this->belongsTo(GameSave::class, 'game_save_id');
    }

    /**
     * @return GameSave
     */
    public function getGameSave(): GameSave
    {
        return $this->gameSave;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PlayerSave
     */
    public function setId(int $id): PlayerSave
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGameSaveId(): int
    {
        return $this->game_save_id;
    }

    /**
     * @param int $game_save_id
     * @return PlayerSave
     */
    public function setGameSaveId(int $game_save_id): PlayerSave
    {
        $this->game_save_id = $game_save_id;
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
     * @return PlayerSave
     */
    public function setHp(int $hp): PlayerSave
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
     * @return PlayerSave
     */
    public function setLevel(int $level): PlayerSave
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
     * @return PlayerSave
     */
    public function setExp(int $exp): PlayerSave
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
     * @return PlayerSave
     */
    public function setDamage(int $damage): PlayerSave
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
     * @return PlayerSave
     */
    public function setState(string $state): PlayerSave
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
     * @return PlayerSave
     */
    public function setPositionWidth(int $position_width): PlayerSave
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
     * @return PlayerSave
     */
    public function setPositionHeight(int $position_height): PlayerSave
    {
        $this->position_height = $position_height;
        return $this;
    }
}
