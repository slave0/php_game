<?php

namespace App\Handler;

use App\State\State;

abstract class AbstractHandler
{
    protected AbstractHandler $nextHandler;

    public function setNext(AbstractHandler $handler): AbstractHandler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(State $request): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}
