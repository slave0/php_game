<?php

namespace App\Http\Services\Game;

use App\Entities\Enemy\ListEnemies;
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
        $this->getEnemies();
    }

    /**
     * @return GameService
     */
    public static function index(): GameService
    {
        return new self();
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
            ->setPositionWidth($position->getPositionWidth())
            ->setPositionHeight($position->getPositionHeight());
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
     * @return void
     */
    protected function getEnemies(): void
    {
        $enemies = Enemy::query()->get()->map(function (Enemy $enemy) {
            /** @var BoardPosition $position */
            $position = $enemy->boardPosition()->get()->first();

            return (new \App\Entities\Enemy\Enemy())
                ->setId($enemy->getId())
                ->setType($enemy->getType())
                ->setHp($enemy->getHp())
                ->setDamage($enemy->getDamage())
                ->setPositionWidth($position->getPositionWidth())
                ->setPositionHeight($position->getPositionHeight());

        })->toArray();

        ListEnemies::getInstance()->setEnemies($enemies);
    }
}
