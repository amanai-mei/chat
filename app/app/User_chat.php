<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_chat extends Model
{
    protected $fillable = [
        'user_id', 'message', 'to_id',
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function user()
{
    return $this->belongsTo('App\User');
}
}
