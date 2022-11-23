<?php

namespace App\Http\Services\Command;

interface Command
{
    public function execute();

    public function undo();

    public function redo();
}
