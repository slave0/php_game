<?php

namespace App\Models\Save;

use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $save_id
 * @property int $entity_id
 * @property string $entity_type
 * @property int $position_width
 * @property int $position_height
 * @property-read GameSave $gameSave
 */
class BoardPositionSave extends Model
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
     * @return BoardPositionSave
     */
    public function setId(int $id): BoardPositionSave
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
     * @return BoardPositionSave
     */
    public function setSaveId(int $save_id): BoardPositionSave
    {
        $this->save_id = $save_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entity_id;
    }

    /**
     * @param int $entity_id
     * @return BoardPositionSave
     */
    public function setEntityId(int $entity_id): BoardPositionSave
    {
        $this->entity_id = $entity_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entity_type;
    }

    /**
     * @param string $entity_type
     * @return BoardPositionSave
     */
    public function setEntityType(string $entity_type): BoardPositionSave
    {
        $this->entity_type = $entity_type;
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
     * @return BoardPositionSave
     */
    public function setPositionWidth(int $position_width): BoardPositionSave
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
     * @return BoardPositionSave
     */
    public function setPositionHeight(int $position_height): BoardPositionSave
    {
        $this->position_height = $position_height;
        return $this;
    }
}
