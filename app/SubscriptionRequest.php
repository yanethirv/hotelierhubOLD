<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionRequest extends Model
{
    protected $guarded = ["id"];

    public function subscription() {
        return $this->belongsTo(Subscription::class);
    }
}
