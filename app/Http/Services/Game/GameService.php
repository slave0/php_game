<?php

namespace App\Http\Services\Game;

use App\Entities\Player\Player;
use App\Models\Board;
use App\Models\BoardPosition;
use App\Models\Enemy;

class GameService
{

    public function __construct()
    {
        $this->getPlayer();
        $this->getBoard();
    }

    protected function getPlayer(): void
    {
        /** @var \App\Models\Player $player */
        $player = \App\Models\Player::query()->get()->first();
        /** @var BoardPosition $position */
        $position = $player->boardPosition()->get()->first();

        Player::getInstance()
            ->setHp($player->getHp())
            ->setLevel($player->getLevel())
            ->setExp($player->getExp())
            ->setDamage($player->getDamage())
            ->setPositionWidth($position->getWidth())
            ->setPositionHeight($position->getHeight());
    }

    protected function getBoard(): void
    {
        /** @var Board $board */
        $board = Board::query()->get()->first();

        \App\Entities\Board\Board::getInstance()
            ->setWidth($board->getWidth())
            ->setHeight($board->getHeight());
    }

    /**
     * @return array
     */
    public function getEnemies(): array
    {
        return Enemy::query()->get()->map(function (Enemy $enemy) {
            /** @var BoardPosition $position */
            $position = $enemy->boardPosition()->get()->first();

            return (new \App\Entities\Enemy\Enemy())
                ->setType($enemy->getType())
                ->setHp($enemy->getHp())
                ->setDamage($enemy->getDamage())
                ->setPositionWidth($position->getWidth())
                ->setPositionHeight($position->getHeight());

        })->toArray();
    }
}
