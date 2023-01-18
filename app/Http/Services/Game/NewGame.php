<?php

namespace App\Http\Services\Game;


use App\Models\Board;
use App\Models\Enemy;
use App\Models\Player;
use App\Entities\Player\Player as PlayerEntity;
use App\Entities\Enemy\Enemy as EnemyEntity;
use Faker\Generator;
use App\Entities\Board\Board as BoardEntity;

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
        (new Player())
            ->setHp(PlayerEntity::HP)
            ->setDamage(PlayerEntity::DAMAGE)
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

            [$width, $height] = $this->generatePositions($board->getWidth());

            (new Enemy())
                ->setType($this->faker->randomElement(EnemyEntity::TYPES_ENEMIES))
                ->setHp(EnemyEntity::ENEMY_HP)
                ->setDamage(EnemyEntity::ENEMY_DAMAGE)
                ->setPositionWidth($width)
                ->setPositionHeight($height)
                ->save();

        }
    }

    /**
     * @param int $max
     * @param int $min
     * @return array
     */
    protected function generatePositions(int $max, int $min = BoardEntity::MINIMUM_COORDINATE): array
    {
        $width = $this->faker->numberBetween($min , $max);

        $height = $this->faker->numberBetween($min, $max);

        $enemyPosition = Enemy::query()->where('position_width', $width)->exists();

        $playerPosition = Player::query()->where('position_width', $width)->exists();

        if ($enemyPosition || $playerPosition) {
            return $this->generatePositions($max);
        }

        return [$width, $height];
    }
}
