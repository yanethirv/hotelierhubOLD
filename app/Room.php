<?php

namespace App;

use App\Hotel;
use App\Typeroom;
use App\Occupancy;
use App\Rateplan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $guarded = ["id"];

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function typeroom() {
        return $this->belongsTo(Typeroom::class);
    }

    public function occupancy() {
        return $this->belongsTo(Occupancy::class);
    }

    public function rateplans()
    {
        return $this->belongsToMany(Rateplan::class);
    }
}
