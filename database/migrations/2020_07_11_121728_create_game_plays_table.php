<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamePlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_plays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id')->index();
            $table->unsignedBigInteger('game_id')->index();
            $table->unsignedBigInteger('invited_player_one')->nullable()->index();
            $table->unsignedBigInteger('invited_player_two')->nullable()->index();
            $table->unsignedBigInteger('invited_player_three')->nullable()->index();
            $table->unsignedBigInteger('invited_player_four')->nullable()->index();
            $table->timestamps();

           // set foreign keys
           $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
           $table->foreign('invited_player_one')->references('id')->on('players')->onDelete('set null');
           $table->foreign('invited_player_two')->references('id')->on('players')->onDelete('set null');
           $table->foreign('invited_player_three')->references('id')->on('players')->onDelete('set null');
           $table->foreign('invited_player_four')->references('id')->on('players')->onDelete('set null');
           $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_plays');
    }
}
