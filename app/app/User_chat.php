<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_chat extends Model
{
    protected $fillable = [
        'user_id', 'message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
}
