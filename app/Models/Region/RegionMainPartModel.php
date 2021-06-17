<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class RegionMainPartModel extends Model
{
    protected $fillable = [
        'parent_id',
        'slug',
        'weather',
        'region_center_title',
        'region_center_info',
        'region_center_other',
        'average_prices',
        'average_other',
        'Georgia',
        'Yerevan',
        'Iran',
    ];
}
