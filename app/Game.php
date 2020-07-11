<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function players()
    {
        return $this->belongsToMany('App\Player', 'game_plays', 'game_id')->withTimestamps();
    }
}
