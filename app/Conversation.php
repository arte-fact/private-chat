<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'name',
    ];
    public function conversationUsers() {
        return $this->hasMany(ConversationUser::class);
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function users() {

        return$this->belongsToMany(
            User::class,
            "conversation_user",
            "conversation_id",
            "user_id",
            "id"
        );
    }
}
