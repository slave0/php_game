<?php

namespace App\Models;

/**
 * @property int $id
 * @property int $entity_id
 * @property string $entity_type
 * @property int $width
 * @property int $height
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
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return BoardPosition
     */
    public function setWidth(int $width): BoardPosition
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return BoardPosition
     */
    public function setHeight(int $height): BoardPosition
    {
        $this->height = $height;
        return $this;
    }
}
