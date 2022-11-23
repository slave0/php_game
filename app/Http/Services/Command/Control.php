<?php

namespace App\Http\Services\Command;

class Control
{
    public function submit(Command $command)
    {
        $command->execute();
    }
}
