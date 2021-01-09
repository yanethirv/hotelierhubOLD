<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $guarded = ["id"];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function productRequests() {
        return $this->hasMany(ProductRequest::class);
    }

}
