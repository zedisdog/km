<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['id','title','content','ab','created_at','updated_at'];
    //
}
