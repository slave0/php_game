<?php

namespace App\Http\Services;

use App\Entities\Player\Player;

class CaretakerPlayer
{
    /**
     * @var array
     */
    private array $mementos = [];

    /**
     * @var Player
     */
    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }


    public function save(): array
    {
        $this->mementos[] = $this->player->save();
        return $this->mementos;
    }

    public function reset(): void
    {
        if (!count($this->mementos)) {
            return;
        }

        $memento = array_pop($this->mementos);

        $this->player->load($memento);
    }

    public function load(array $mementos, int $id): void
    {
        $this->mementos = $mementos;
        $this->player->load($mementos[$id]);
    }
}
