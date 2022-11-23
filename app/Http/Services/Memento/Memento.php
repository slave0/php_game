<?php

namespace App\Http\Services\Memento;

use App\Entities\Entity;

interface Memento
{
    public function __construct(Entity $entity);
}
