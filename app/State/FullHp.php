<?php

namespace App\State;

class FullHp implements State
{
    public function hit(int $damage): int
    {
        return $damage;
    }

    public function run(): int
    {
        return 7;
    }
}
