<?php

namespace App\Models;

/**
 * @property int $id
 * @property int $entity_id
 * @property string $entity_type
 * @property int $position_width
 * @property int $position_height
 */
class BoardPosition extends Model
{

    public function BoardPositionable()
    {
        return $this->morphTo();
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
     * @return BoardPosition
     */
    public function setId(int $id): BoardPosition
    {
        $this->id = $id;
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
     * @return BoardPosition
     */
    public function setEntityId(int $entity_id): BoardPosition
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
     * @return BoardPosition
     */
    public function setEntityType(string $entity_type): BoardPosition
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
     * @return BoardPosition
     */
    public function setPositionWidth(int $position_width): BoardPosition
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
     * @return BoardPosition
     */
    public function setPositionHeight(int $position_height): BoardPosition
    {
        $this->position_height = $position_height;
        return $this;
    }
}
