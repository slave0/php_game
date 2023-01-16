<?php

namespace App\Http\Interfaces;

interface Entity
{
    public function up();
    public function left();
    public function right();
    public function down();
}
