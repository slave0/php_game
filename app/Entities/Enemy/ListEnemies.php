<?php

namespace App\Entities\Enemy;

use App\Traits\Singleton;

class ListEnemies
{
    use Singleton;

    protected array $enemies;

    /**
     * @return array
     */
    public function getEnemies(): array
    {
        return $this->enemies;
    }

    /**
     * @param array $enemies
     * @return ListEnemies
     */
    public function setEnemies(array $enemies): ListEnemies
    {
        $this->enemies = $enemies;
        return $this;
    }
}
