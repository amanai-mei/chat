<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_chat extends Model
{
    protected $fillable = [
        'user_id', 'message', 'group_id',
    ];
   

    public function group(){
        return $this->belongsTo('App\group', 'group_id','id');
    }
    public function user(){
        return $this->belongsTo('App\user', 'user_id','id');
    }
}
