<?php

namespace App\Http\Services\Save;

use App\Entities\Player\Player;
use App\Http\Services\CaretakerPlayer;
use App\Http\Services\SaveList;
use Illuminate\Support\Facades\Storage;

class SaveService
{
    public function saveEntities()
    {
        $player = Player::getInstance();

        $caretaker = new CaretakerPlayer($player);
        $save = serialize($caretaker->save());

        Storage::append('entities.txt', '%%'.$save);
    }

    public function loadEntities()
    {
        $saves = $this->getSaves('entities.txt');

        if (!$saves) {
            return false;
        }

        $player = Player::getInstance();
        $caretaker = new CaretakerPlayer($player);
        $caretaker->load($saves, array_key_last($saves));
        return 'level: ' . $player->getLevel() . ' hp: '. $player->getHp();
    }

    public function save()
    {
        $player = Player::getInstance();
        $caretaker = new CaretakerPlayer($player);
        $save = serialize($caretaker->save());

        return Storage::append('save.txt', '%%'.$save) ? 'Игра сохранена' : 'Ошибка';
    }

    public function listSave()
    {
        $saves = $this->getSaves();

        $saveList = new SaveList($saves);
        foreach ($saveList as $key => $save) {

            echo 'save '. $key+1 .' : level: '.$save->getLevel() . ' hp: ' . $save->getHp().'<br>';

        }
    }

    public function load(int $id)
    {
        $saves = $this->getSaves();

        $player = Player::getInstance();
        $caretaker = new CaretakerPlayer($player);
        $caretaker->load($saves, $id-1);
        echo 'level: ' . $player->getLevel() . ' hp: '. $player->getHp();
    }


    public function getSaves($path = 'save.txt'): array
    {
        $saves = Storage::get($path);
        $saves = explode('%%', $saves);
        unset($saves[0]);

        $result = [];

        foreach ($saves as $save) {

            $result = array_merge($result, unserialize($save));

        }

        return $result;
    }
}
