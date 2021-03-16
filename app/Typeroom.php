<?php

namespace App;

use App\Room;
use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    protected $guarded = ["id"];

    public function rooms() {
        return $this->hasMany(Room::class);
    }
}
