<?php

namespace App\Http\Services\Game;

use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player as EntityPlayer;
use App\Entities\Enemy\Enemy as EntityEnemy;
use App\Models\Enemy;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class SaveEntities
{
    /**
     * @return void
     */
    public static function execute(): void
    {
        $saveService = new self();
        $saveService->save();
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        DB::beginTransaction();

        $this->savePlayer();
        $this->saveEnemies();

        DB::commit();
    }

    /**
     * @return void
     */
    protected function savePlayer(): void
    {
        $player = EntityPlayer::getInstance();

        /** @var Player $playerModel */
        $playerModel = Player::query()->get()->first();

        $playerModel
            ->setHp($player->getHp())
            ->setDamage($player->getDamage())
            ->setExp($player->getExp())
            ->setLevel($player->getLevel())
            ->setPositionWidth($player->getPositionWidth())
            ->setPositionHeight($player->getPositionHeight())
            ->save();
    }

    /**
     * @return void
     */
    protected function saveEnemies(): void
    {
        $enemies = ListEnemies::getInstance()->getEnemies();

        /** @var EntityEnemy $enemy */
        foreach ($enemies as $enemy) {
            $enemyModel = Enemy::find($enemy->getId());
            $enemyModel->update(
                [
                    'hp'=> $enemy->getHp(),
                    'damage' => $enemy->getDamage(),
                    'position_width' => $enemy->getPositionWidth(),
                    'position_height' => $enemy->getPositionHeight()
                ]);
        }
    }
}
