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

    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'id', 'conversation_id');
    }

    public function sender() {
        return $this->belongsTo('App\User', 'id','author_id');
    }
}
