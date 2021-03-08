<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Document extends Model
{
    use SoftDeletes;
 
    protected $dates = ['deleted_at'];

    protected $guarded = ["id"];

}