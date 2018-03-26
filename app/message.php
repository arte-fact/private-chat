<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
        'message',
        'recipient',
        'sender',
    ];

    public function recipient() {
        return $this->hasOne('App\User', 'id','recipient');
    }
    public function sender() {
        return $this->hasOne('App\User', 'id','sender');
    }
}
