<?php

namespace App\State;

class Tired implements State
{
    public function hit(int $damage): float
    {
        return $damage * 0.6;
    }

    public function run(): int
    {
        return 3;
    }
}
