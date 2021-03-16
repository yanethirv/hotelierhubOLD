<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ["id"];

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
