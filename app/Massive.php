<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Massive extends Model
{
    protected $guarded = [];


    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
