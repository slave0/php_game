<?php

namespace App\Http\Services\Game;


use App\Models\Board;
use App\Models\BoardPosition;
use App\Models\Enemy;
use App\Models\Player;
use App\Entities\Player\Player as PlayerEntity;
use App\Entities\Enemy\Enemy as EnemyEntity;
use Faker\Generator;

class NewGame
{
    public function __construct(protected Generator $faker)
    {
        if (!Player::query()->get()->first()) {
            $this->newPlayer();
            $this->newBoard();
            $this->newEnemies(4);
        }
    }

    /**
     * @return void
     */
    protected function newPlayer(): void
    {
        $player = (new Player())
            ->setHp(PlayerEntity::HP)
            ->setDamage(PlayerEntity::DAMAGE);
        $player->save();

        (new BoardPosition())
            ->setEntityId($player->getId())
            ->setEntityType($player->getMorphClass())
            ->setPositionWidth(PlayerEntity::DEFAULT_WIDTH)
            ->setPositionHeight(PlayerEntity::DEFAULT_HEIGHT)
            ->save();
    }

    /**
     * @return void
     */
    protected function newBoard(): void
    {
        (new Board())
            ->setWidth(8)
            ->setHeight(8)
            ->save();
    }

    /**
     * @param $repeat
     * @return void
     */
    protected function newEnemies($repeat): void
    {
        /** @var Board $board */
        $board = Board::query()->get()->first();

        for ($i = 1; $i < $repeat; $i++) {
            $enemy = (new Enemy())
                ->setType($this->faker->randomElement(EnemyEntity::TYPES_ENEMIES))
                ->setHp(EnemyEntity::ENEMY_HP)
                ->setDamage(EnemyEntity::ENEMY_DAMAGE);
            $enemy->save();

            $this->setEnemyPosition($enemy, $board->getWidth());
        }
    }

    /**
     * @param Enemy $enemy
     * @param int $max
     * @param int $min
     * @return void
     */
    protected function setEnemyPosition(Enemy $enemy, int $max, int $min = 1): void
    {
        $width = $this->faker->numberBetween($min , $max);
        $positions = BoardPosition::query()->where('width', $width)->get();
        $height = $this->getHeight($positions, $max, $min);

        (new BoardPosition())
            ->setEntityId($enemy->getId())
            ->setEntityType($enemy->getMorphClass())
            ->setPositionWidth($width)
            ->setPositionHeight($height)
            ->save();
    }

    /**
     * @param $positions
     * @param int $max
     * @param int $min
     * @return int
     */
    protected function getHeight($positions, int $max, int $min): int
    {
        if ($positions) {

            $arrayPositions = $positions->map(function (BoardPosition $position) {
                return $position->getPositionHeight();
            })->toArray();

            $height = $this->faker->numberBetween($min, $max);

            if (in_array($height, $arrayPositions)) {
                $height = $this->getHeight($positions, $max, $min);
            }

        } else {
            $height = $this->faker->numberBetween($min, $max);
        }

        return $height;
    }
}
