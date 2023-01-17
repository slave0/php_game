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
        Schema::create('saves', function (Blueprint $table) {
            $table->id();
            $table->integer('board_height');
            $table->integer('board_width');
            $table->timestamps();
        });

        Schema::create('save_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('save_id');
            $table->integer('hp');
            $table->integer('level')->default(1);
            $table->integer('exp')->default(0);
            $table->integer('damage');
            $table->string('state')->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->timestamps();
        });

        Schema::create('save_enemies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('save_id');
            $table->string('type');
            $table->integer('hp');
            $table->integer('damage');
            $table->integer('width');
            $table->integer('height');
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
