<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ["id"];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function plans() {
        return $this->hasMany(Plan::class);
    }
}
