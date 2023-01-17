<?php


namespace App\Models\Save;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $game_save_id
 * @property int $hp
 * @property int $damage
 * @property string type
 * @property int $position_width
 * @property int $position_height
 * @property-read GameSave $gameSave
 */
class EnemySave extends Model
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
     * @return EnemySave
     */
    public function setId(int $id): EnemySave
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
    public function setGameSaveId(int $game_save_id): EnemySave
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
     * @return EnemySave
     */
    public function setHp(int $hp): EnemySave
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
     * @return EnemySave
     */
    public function setDamage(int $damage): EnemySave
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
     * @return EnemySave
     */
    public function setType(string $type): EnemySave
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
     * @return EnemySave
     */
    public function setPositionWidth(int $position_width): EnemySave
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
     * @return EnemySave
     */
    public function setPositionHeight(int $position_height): EnemySave
    {
        $this->position_height = $position_height;
        return $this;
    }
}
