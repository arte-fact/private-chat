<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'name',
    ];
    public function userConversations() {
        return $this->hasMany(UserConversation::class, 'id','user_id');
    }
    public function messages() {
        return $this->hasMany(Message::class, 'conversation_id','id');
    }
}
