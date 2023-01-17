<?php


namespace App\Http\Interfaces;

use App\Http\Services\Memento\Memento;

interface Savatable
{
    public function save();

    public function load(Memento $memento);
}
