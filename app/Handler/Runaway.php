<?php

namespace App\Handler;

use App\State\Tired;

class Runaway extends AbstractHandler
{
    public function handle($request): string
    {
        if ($request instanceof Tired) {
            return 'Враг наносит крит урон';
        }

        return parent::handle($request);
    }
}
