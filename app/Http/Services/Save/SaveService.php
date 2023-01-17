<?php


namespace App\Http\Services\Save;


use App\Entities\Board\Board;
use App\Entities\Enemy\ListEnemies;
use App\Entities\Player\Player;
use App\Http\Services\Memento\MementoBoard;
use App\Http\Services\Memento\MementoEnemy;
use App\Http\Services\Memento\MementoPlayer;
use App\Models\Save\Save;
use App\Models\Save\SaveEnemy;
use App\Models\Save\SavePlayer;
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

        $caretaker = new Caretaker($board);

        /** @var MementoBoard $boardSave */
        $boardSave = $caretaker->save();

        $save = (new Save())
            ->setBoardHeight($boardSave->getHeight())
            ->setBoardWidth($boardSave->getWidth());

        $save->save();

        return $save->getId();
    }

    /**
     * @param int $saveId
     */
    protected function savePlayer(int $saveId): void
    {
        $player = Player::getInstance();

        $caretaker = new Caretaker($player);

        /** @var MementoPlayer $playerSave */
        $playerSave = $caretaker->save();

        (new SavePlayer)
            ->setHp($playerSave->getHp())
            ->setLevel($playerSave->getLevel())
            ->setDamage($playerSave->getDamage())
            ->setExp($playerSave->getExp())
            ->setPositionHeight($playerSave->getPositionHeight())
            ->setPositionWidth($playerSave->getPositionWidth())
            ->setSaveId($saveId)
            ->save();
    }

    /**
     * @param int $saveId
     */
    protected function saveEnemies(int $saveId): void
    {
        $enemies = ListEnemies::getInstance();

        foreach ($enemies as $enemy) {

            $caretaker = new Caretaker($enemy);

            /** @var MementoEnemy $enemySave */
            $enemySave = $caretaker->save();

            (new SaveEnemy())
                ->setSaveId($saveId)
                ->setHp($enemySave->getHp())
                ->setDamage($enemySave->getDamage())
                ->setType($enemySave->getType())
                ->setPositionWidth($enemySave->getPositionWidth())
                ->setPositionHeight($enemySave->getPositionHeight())
                ->save();
        }
    }
}
