<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_saves', function (Blueprint $table) {
            $table->id();
            $table->integer('board_height');
            $table->integer('board_width');
            $table->timestamps();
        });

        Schema::create('players_save', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_save_id');
            $table->integer('hp');
            $table->integer('level')->default(1);
            $table->integer('exp')->default(0);
            $table->integer('damage');
            $table->string('state')->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();
        });

        Schema::create('enemies_save', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_save_id');
            $table->string('type');
            $table->integer('hp');
            $table->integer('damage');
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();
        });

        Schema::create('board_positions_save', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_save_id');
            $table->integer('entity_id');
            $table->string('entity_type');
            $table->integer('position_width');
            $table->integer('position_height');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saves');
        Schema::dropIfExists('save_players');
        Schema::dropIfExists('save_enemies');
    }
};
