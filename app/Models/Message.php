<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content',
        'is_read',
        'user_id',
        'channel_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
