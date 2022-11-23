<?php

namespace App\Http\Services;

use App\Entities\Entity;

class Caretaker
{
    /**
     * @var array
     */
    private array $mementos = [];

    /**
     * @var Entity
     */
    private Entity $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }


    public function save(): array
    {
        $this->mementos[] = $this->entity->save();
        return $this->mementos;
    }

    public function reset(): void
    {
        if (!count($this->mementos)) {
            return;
        }

        $memento = array_pop($this->mementos);

        $this->entity->load($memento);
    }

    public function load(array $mementos, int $id = 0): void
    {
        $this->mementos = $mementos;
        $this->entity->load($mementos[$id]);
    }
}
