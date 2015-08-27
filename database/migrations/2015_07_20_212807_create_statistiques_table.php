<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiques', function(Blueprint $table) {
            $table->increments('id');
            $table->string('minutes');
            $table->string('passe');
            $table->string('points');
            $table->string('trois_points');
            $table->string('titulaire');
            $table->string('lancer_franc');
            $table->string('rebonds');
            $table->string('interceptions');
            $table->string('fautes');
            $table->integer('victoire');
            $table->integer('user_id');
            $table->integer('game_id');
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
        Schema::drop('statistiques');
    }
}
