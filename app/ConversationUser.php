<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConversationUser extends Model
{
    protected $fillable = [
        'user_id',
        'conversation_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function conversation() {
        return $this->belongsTo(Conversation::class)->with('messages');
    }
}
