<?php

namespace App\Handler;

use App\State\FullHp;

class Hit extends AbstractHandler
{
    public function handle($request): string
    {
        if ($request instanceof FullHp) {
            return 'Враг ударил';
        }

        return parent::handle($request);
    }
}
