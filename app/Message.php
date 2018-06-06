<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',
        'author_id',
        'conversation_id',
    ];

    public function recipient() {
        return $this->hasOne('App\User', 'id','author_id');
    }
    public function sender() {
        return $this->hasOne('App\User', 'id','conversation_id');
    }
}
