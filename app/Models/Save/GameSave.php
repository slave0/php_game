<?php


namespace App\Models\Save;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $board_height
 * @property int $board_width
 * @property-read EnemySave $saveEnemies
 * @property-read PlayerSave $savePlayer
 */
class GameSave extends Model
{
    public function playerSave(): HasOne
    {
        return $this->hasOne(PlayerSave::class, 'save_id', 'id');
    }

    public function enemiesSave(): HasMany
    {
        return $this->hasMany(EnemySave::class, 'save_id', 'id');
    }

    public function BoardPositionSave(): HasMany
    {
        return $this->hasMany(BoardPositionSave::class, 'save_id', 'id');
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
     * @return GameSave
     */
    public function setId(int $id): GameSave
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoardHeight(): int
    {
        return $this->board_height;
    }

    /**
     * @param int $board_height
     * @return GameSave
     */
    public function setBoardHeight(int $board_height): GameSave
    {
        $this->board_height = $board_height;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoardWidth(): int
    {
        return $this->board_width;
    }

    /**
     * @param int $board_width
     * @return GameSave
     */
    public function setBoardWidth(int $board_width): GameSave
    {
        $this->board_width = $board_width;
        return $this;
    }

    /**
     * @return EnemySave
     */
    public function getSaveEnemies(): EnemySave
    {
        return $this->saveEnemies;
    }

    /**
     * @return PlayerSave
     */
    public function getSavePlayer(): PlayerSave
    {
        return $this->savePlayer;
    }
}
