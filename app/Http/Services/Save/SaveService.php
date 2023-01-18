<?php


namespace App\Http\Services\Save;


use App\Entities\Board\Board;
use App\Entities\Enemy\Enemy;
use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;
use App\Models\BoardPosition;
use App\Models\Save\GameSave;
use App\Models\Save\EnemySave;
use App\Models\Save\PlayerSave;
use App\Traits\ErrorMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SaveService
{
    use ErrorMessage;

    /**
     * @return bool
     */
    public function saveEntities(): bool
    {
        DB::beginTransaction();

        try {

            $saveId = $this->saveBoard();
            $this->savePlayer($saveId);
            $this->saveEnemies($saveId);

        } catch (\Exception $ex) {
            DB::rollBack();

            $this->setMessage('Ошибка сохранения');
            Log::critical('Ошибка сохранения сущностей'. $ex->getMessage());

            return false;
        }

        DB::commit();

        return true;
    }

    /**
     * @return int
     */
    protected function saveBoard(): int
    {
        $board = Board::getInstance();

        $save = (new GameSave())
            ->setBoardHeight($board->getHeight())
            ->setBoardWidth($board->getWidth());

        $save->save();

        return $save->getId();
    }

    /**
     * @param int $saveId
     */
    protected function savePlayer(int $saveId): void
    {
        $player = Player::getInstance();

        (new PlayerSave)
            ->setHp($player->getHp())
            ->setLevel($player->getLevel())
            ->setDamage($player->getDamage())
            ->setExp($player->getExp())
            ->setPositionHeight($player->getPositionHeight())
            ->setPositionWidth($player->getPositionWidth())
            ->setGameSaveId($saveId)
            ->save();
    }

    /**
     * @param int $saveId
     */
    protected function saveEnemies(int $saveId): void
    {
        $enemies = ListEnemies::getInstance();

        /** @var Enemy $enemy */
        foreach ($enemies as $enemy) {

            (new EnemySave())
                ->setGameSaveId($saveId)
                ->setHp($enemy->getHp())
                ->setDamage($enemy->getDamage())
                ->setType($enemy->getType())
                ->setPositionWidth($enemy->getPositionWidth())
                ->setPositionHeight($enemy->getPositionHeight())
                ->save();
        }
    }

    /**
     * @return array
     */
    public function listSaves(): array
    {
        $result = [];

        $gameSaves = GameSave::query()->with('savePlayer')->get();

        /** @var GameSave $save */
        foreach ($gameSaves as $save) {
            $result[] = ['save' => $save, 'playerSave' => $save->getSavePlayer()];
        }

        return $result;
    }

    public function load(int $saveId)
    {
        /** @var GameSave $save */
        if (!$save = GameSave::find($saveId)) {
            $this->setMessage('Сохранение не найдено');
            return false;
        }


    }


}
