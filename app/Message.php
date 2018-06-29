<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'author_id',
        'conversation_id',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender() {
        return $this->belongsTo('App\User', 'id','author_id');
    }

    public function getConversationId()
    {
        return (string) $this->conversationId;
    }
}
