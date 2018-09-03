<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = [
        'driver',
        'chat_id',
        'first_name',
        'last_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
