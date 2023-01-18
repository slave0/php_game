<?php

namespace App\Http\Services\Game;

use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;
use App\Models\Board;
use App\Models\BoardPosition;
use App\Models\Enemy;
use App\Models\Save\BoardPositionSave;
use App\Models\Save\GameSave;
use App\Models\Save\PlayerSave;

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

        self::setPlayer($player);
    }

    /**
     * @param \App\Models\Player|PlayerSave $player
     * @return void
     */
    public static function setPlayer(\App\Models\Player|PlayerSave $player): void
    {
        Player::getInstance()
            ->setHp($player->getHp())
            ->setLevel($player->getLevel())
            ->setExp($player->getExp())
            ->setDamage($player->getDamage())
            ->setPositionWidth($player->getPositionWidth())
            ->setPositionHeight($player->getPositionHeight());
    }

    protected function getBoard(): void
    {
        /** @var Board $board */
        $board = Board::query()->get()->first();

        self::setBoard($board);
    }


    public static function setBoard(Board|GameSave $board): void
    {
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

            return self::setEnemies($enemy);

        })->toArray();

        ListEnemies::getInstance()->setEnemies($enemies);
    }

    /**
     * @param $enemy
     * @return \App\Entities\Enemy\Enemy
     */
    public static function setEnemies($enemy): \App\Entities\Enemy\Enemy
    {
        return (new \App\Entities\Enemy\Enemy())
            ->setId($enemy->getId())
            ->setType($enemy->getType())
            ->setHp($enemy->getHp())
            ->setDamage($enemy->getDamage())
            ->setPositionWidth($enemy->getPositionWidth())
            ->setPositionHeight($enemy->getPositionHeight());
    }
}
