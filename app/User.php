<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany('App\Message', 'sender');
    }

    public function conversations()
    {
        return $this->belongsToMany('App\Conversation', 'user_conversations',
            'user_id', 'conversation_id');
    }

    public function friendships()
    {
        return $this->belongsToMany('App\Friendship', 'friendships',
            'user_id', 'conversation_id');
    }
}
