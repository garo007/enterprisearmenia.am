<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class RegionInformateModel extends Model
{
    protected $fillable = [
        'parent_id',
        'slug',
        'territory',
        'agricultrual_land',
        'total_population',
        'urban',
        'rural',
        'total_workforce',
        'employed',
        'average_salary',
        'specialization',
        'success_case',
        'agriculture',
        'agriculture_comments',
        'retail_trade',
        'retail_trade_comments',
        'construction',
        'construction_comments',
        'industry',
        'industry_comments',
        'tourism',
        'cropproduction',
        'portable_energy',
        'food_processing',
        'beverage_production',
        'textile',
        'field_1',
        'field_2',
        'field_3',
        'field_4',
    ];
}
