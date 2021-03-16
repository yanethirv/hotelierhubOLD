<?php

namespace App;

use App\Hotel;
use App\Room;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Rateplan extends Model
{
    protected $guarded = ["id"];

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
