<?php

namespace App;

use App\Hotel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
    protected $guarded = ["id"];

    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
