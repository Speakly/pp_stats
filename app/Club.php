<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function game_team_id_2(){
    	return $this->hasMany('App\Game', 'id', 'game_team_id_2');
    }
}
