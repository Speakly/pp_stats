<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistiques extends Model
{
    protected $fillable = ['minutes', 'passe', 'points', 'trois_points', 'game_id', 'evaluation', 'titulaire', 'lancer_franc', 'rebonds', 'interceptions', 'fautes', 'victoire', 'user_id'];

    public function statistiques()
    {
    	return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function game()
    {
    	return $this->belongsTo('App\Game', 'game_id', 'id');
    }
}
