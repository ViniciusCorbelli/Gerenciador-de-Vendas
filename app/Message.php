<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];  

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }
}
