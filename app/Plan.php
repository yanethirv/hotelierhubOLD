<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = ["id"];

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
