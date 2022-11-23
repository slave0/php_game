<?php

namespace App\Http\Controllers;

use App\Entities\Enemy\Ogr;
use App\Entities\Player\Player;
use App\Http\Services\Command\Control;
use App\Http\Services\Command\Player\Down;
use App\Http\Services\Command\Player\Left;
use App\Http\Services\Command\Player\Right;
use App\Http\Services\Command\Player\Up;
use App\Http\Services\Save\SaveService;
use Illuminate\Http\Request;
use function Composer\Autoload\includeFile;

class AjaxController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('name');
        $player = Player::getInstance();

        $control = new Control();

        match ($data) {
            'up' => $control->submit(new Up($player)),
            'down' => $control->submit(new Down($player)),
            'left' => $control->submit(new Left($player)),
            'right' => $control->submit(new Right($player)),
        };

        $ogr = Ogr::getInstance();

        if ($player->getWay()['row'] == $ogr->getRow() && $player->getWay()['column'] == $ogr->getColumn()) {

            $hit = $player->hit();
            $enemyHp = $ogr->getHp() - $hit;

            $text = "Противнику было нанесено  $hit   ";

            if ($enemyHp > 1) {
                $ogr->setHp($enemyHp);
                $text .= 'Осталось ' . $ogr->getHp(). ' ';
            } else {
                $ogr->setRow(rand(1,8));
                $ogr->setColumn(rand(1,8));
                $ogr->setHp(rand(8,14));
                $ogr->setDamage(rand(5,8));
                $text .= 'Противник побежден  ';
            }


            $hp = $player->getHp() - $ogr->hit();
            $player->setHp($hp);
            $player->getHp() > 1 ?: $result = view('gameOver',)->render();
            $text .= "Противник нанес " . $ogr->hit() . " урона";

        }


        (new SaveService())->saveEntities();
        $way = $player->getWay();

            $result ?? $result = view('welcome', [
                'playerPosition' => $way,
                'hp' => $player->getHp(),
                'damage' => $player->getDamage(),
                'row' => 8,
                'column' => 8,
                'enemy' => $ogr,
                'text' => $text ?? ''
            ]
        )->render();

        return \Response::json([$result]);


    }

    public function newGameAjax()
    {
        $this->newGame(new SaveService());
        $player = Player::getInstance();
        $ogr = Ogr::getInstance();
        $way = $player->getWay();

        $result = view('welcome', [
                'playerPosition' => $way,
                'hp' => $player->getHp(),
                'damage' => $player->getDamage(),
                'row' => 8,
                'column' => 8,
                'enemy' => $ogr,
                'text' => $text ?? ''
            ]
        )->render();
        return \Response::json([$result]);
    }
}
