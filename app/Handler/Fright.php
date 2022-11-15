<?php

namespace App\Handler;

use App\State\LowHp;

class Fright extends AbstractHandler
{
    public function handle($request): string
    {
        if ($request instanceof LowHp) {
            return 'Враг насмехается';
        }

        return parent::handle($request);
    }
}
