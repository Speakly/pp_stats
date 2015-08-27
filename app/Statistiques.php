<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistiques extends Model
{
    protected $fillable = ['minutes', 'passe', 'points', 'trois_points', 'game_id', 'titulaire', 'lancer_franc', 'rebonds', 'interceptions', 'fautes', 'victoire', 'user_id'];
}
