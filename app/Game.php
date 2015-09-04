<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['game_team_id_1', 'game_team_id_2', 'score_user', 'score_adverse', 'date', 'club_id', 'domicile', 'name_adverse'];

    public function game()
    {
        return $this->hasMany('App\User', 'club_id', 'club_id');
    }

    public function game_team_id_2(){
    	return $this->belongsTo('App\Club', 'game_team_id_2', 'id');
    }

    

}
