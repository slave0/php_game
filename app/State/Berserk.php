<?php

namespace App\State;

class Berserk implements State
{
    public function hit(int $damage): float|int
    {
        return $damage * 2;
    }

    public function run(): int
    {
        return 10;
    }

}
