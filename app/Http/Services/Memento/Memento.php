<?php

namespace App\Http\Services\Memento;

use App\Entities\Board\Board;
use App\Http\Interfaces\Entity;

interface Memento
{
    public function __construct(Entity|Board $entity);

}
