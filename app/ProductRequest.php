<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    protected $guarded = ["id"];

    public function orderLine() {
        return $this->belongsTo(OrderLine::class);
    }
}
