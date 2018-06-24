<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'name',
    ];
    public function conversationUsers() {
        return $this->hasMany(ConversationUser::class, 'id','user_id');
    }
    public function messages() {
        return $this->hasMany(Message::class, 'conversation_id','id');
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
