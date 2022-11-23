<?php

namespace App\Entities;

use App\Http\Services\Memento\Memento;

interface Entity
{
    public function save();

    public function load(Memento $memento);
}
