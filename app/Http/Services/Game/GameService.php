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
        /** @var BoardPosition $position */
        $position = $player->boardPosition()->get()->first();

        self::setPlayer($player, $position);
    }

    /**
     * @param \App\Models\Player|PlayerSave $player
     * @param BoardPosition|BoardPositionSave $position
     * @return void
     */
    public static function setPlayer(\App\Models\Player|PlayerSave $player, BoardPosition|BoardPositionSave $position): void
    {
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

            /** @var BoardPosition $position */
            $position = $enemy->boardPosition()->get()->first();

            return self::setEnemies($enemy, $position);

        })->toArray();

        ListEnemies::getInstance()->setEnemies($enemies);
    }

    /**
     * @param $enemy
     * @param BoardPosition|BoardPositionSave $position
     * @return \App\Entities\Enemy\Enemy
     */
    public static function setEnemies($enemy, BoardPosition|BoardPositionSave $position): \App\Entities\Enemy\Enemy
    {
        return (new \App\Entities\Enemy\Enemy())
            ->setId($enemy->getId())
            ->setType($enemy->getType())
            ->setHp($enemy->getHp())
            ->setDamage($enemy->getDamage())
            ->setPositionWidth($position->getPositionWidth())
            ->setPositionHeight($position->getPositionHeight());
    }
}
