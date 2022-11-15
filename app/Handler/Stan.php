<?php

namespace App\Handler;

use App\State\Berserk;

class Stan extends AbstractHandler
{
    public function handle($request): string
    {
        if ($request instanceof Berserk) {
            return 'Враг в стане';
        }

        return parent::handle($request);
    }
}
