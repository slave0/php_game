<?php

namespace App\Http\Services\Save;

use Iterator;

class SaveList implements Iterator
{
    private array $memento;
    private int $currentIndex = 0;

    public function __construct(array $memento)
    {
        $this->memento = $memento;
    }

    public function current()
    {
        return $this->memento[$this->currentIndex];
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function key(): float|bool|int|string|null
    {
        return $this->currentIndex;
    }

    public function valid(): bool
    {
        return isset($this->memento[$this->currentIndex]);
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }
}
