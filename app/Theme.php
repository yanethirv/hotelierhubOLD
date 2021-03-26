<?php

namespace App;

use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = ["id"];

    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }
}
