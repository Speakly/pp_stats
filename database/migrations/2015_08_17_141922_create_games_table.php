<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id');
            $table->integer('game_team_id_1');
            $table->integer('game_team_id_2');
            $table->text('name_adverse');
            $table->integer('domicile');
            $table->integer('score_user');
            $table->integer('score_adverse');
            $table->date('date');
            $table->integer('victoire');
            $table->integer('done');
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
        Schema::drop('games');
    }
}
