<?php

namespace App;

use App\Hotel;
use App\Typerestaurant;
use App\Theme;
use App\Locationrestaurant;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ["id"];

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function typerestaurant() {
        return $this->belongsTo(Typerestaurant::class);
    }

    public function theme() {
        return $this->belongsTo(Theme::class);
    }

    public function locationrestaurant() {
        return $this->belongsTo(Locationrestaurant::class);
    }
}
