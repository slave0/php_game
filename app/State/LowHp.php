<?php

namespace App\State;

class LowHp implements State
{
    public function hit(int $damage): float
    {
        return $damage * 0.8;
    }

    public function run(): int
    {
        return 5;
    }
}
