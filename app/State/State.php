<?php

namespace App\State;

interface State
{
    public function hit(int $damage);
    public function run();
}
