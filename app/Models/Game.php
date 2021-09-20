<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

//    public function room(){
//        return $this->hasOne('App\Models\ChatRoom', 'id','chat_room_id');
//    }

    public function createrUser(){
        return $this->hasOne('App\Models\User', 'id','creater_user_id');
    }
    public function secondUser(){
        return $this->hasOne('App\Models\User', 'id','second_user_id');
    }

    public function choiceCreater(){
        return $this->hasOne('App\Models\Choice', 'id','choice_creater');
    }
    public function choiceSecond(){
        return $this->hasOne('App\Models\Choice', 'id','choice_second');
    }

    public function step(){
        return $this->hasOne('App\Models\Step', 'id','step_id');
    }
}
