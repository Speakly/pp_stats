<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['game_team_id_1', 'game_team_id_2'];

}
