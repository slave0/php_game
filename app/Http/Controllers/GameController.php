<?php

namespace App\Http\Controllers;

use App\Http\Services\GameService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GameController extends Controller
{

    public function index(): Factory|View|Application
    {
        return view('index');
    }
    public function start()
    {

    }

    public function save()
    {

    }

    public function getSaves()
    {

    }

    public function load()
    {

    }
}
