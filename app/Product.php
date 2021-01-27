<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ["id"];

    protected $appends = [
        "picture_with_path"
    ];

    public function getPictureWithPathAttribute() {
        if ($this->picture) {
            return asset(sprintf('/products/%s', $this->picture));
        }
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function activations(){
        return $this->hasMany(Activation::class);
    }
}

