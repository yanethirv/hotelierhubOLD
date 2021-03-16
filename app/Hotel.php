<?php

namespace App;

use App\Rate;
use App\Room;
use App\User;
use App\Policy;
use App\Mealplan;
use App\Restaurant;
use App\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }

    public function mealplans() {
        return $this->hasMany(Mealplan::class);
    }

    public function policies() {
        return $this->hasMany(Policy::class);
    }

    public function rates() {
        return $this->hasMany(Rate::class);
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function setExperienceAttribute($value)
    {
        $this->attributes['experience'] = json_encode($value);
    }

    public function getExperienceAttribute($value)
    {
        return $this->attributes['experience'] = json_decode($value);
    }
}

