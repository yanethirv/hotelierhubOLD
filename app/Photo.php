<?php

namespace App;

use App\Hotel;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = ["id"];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
}
