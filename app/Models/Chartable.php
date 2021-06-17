<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Chartable extends BaseModel
{
    protected $fillable = ['chart_id','chartable_id','chartable_type','post_position',];
}
