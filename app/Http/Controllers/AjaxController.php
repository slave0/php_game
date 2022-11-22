<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->get('name');

        match ($data) {
            'up' => $result = 1,
            'down' => $result = 2,
            'left' => $result = 3,
            'right' => $result = 4,
        };

        return $result;

    }
}
