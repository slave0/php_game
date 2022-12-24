<?php

namespace App\Http\Services;

use App\Entities\Player\Player;
use App\Models\Board;
use App\Models\Enemy;

class GameService
{
    static private function getPlayer(): void
    {
        /** @var \App\Models\Player $player */
        $player = \App\Models\Player::query()->get()->first();

        Player::getInstance()
            ->setHp($player->getHp())
            ->setLevel($player->getLevel())
            ->setExp($player->getExp())
            ->setDamage($player->getDamage());
    }

    static private function getBoard(): void
    {
        /** @var Board $board */
        $board = Board::query()->get()->first();

        \App\Entities\Board\Board::getInstance()
            ->setWidth($board->getWeight())
            ->setHeight($board->getHeight());

    }

    /**
     * @return array
     */
    static private function getEnemies(): array
    {
        $enemies = Enemy::query()->get();
        $result = [];

        /** @var Enemy $enemy */
        foreach ($enemies as $enemy) {
            $result[] = (new \App\Entities\Enemy\Enemy())
                ->setType($enemy->getType())
                ->setName($enemy->getName())
                ->setHp($enemy->getHp())
                ->setDamage($enemy->getDamage());
        }

        return $result;
    }

}
