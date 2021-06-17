<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\App;

class Chart extends BaseModel
{
    protected $table = 'charts';
    protected $translatable = ['name'];
    protected $fillable = ['name', "data", 'type', 'series','line', 'lang', 'color', 'color_line'];


    public const POSITION_TOP = 'top';
    public const POSITION_BOTTOM = 'bottom';

    /*
     * Ամեն պոստ հնարավորություն ունի չարտը կոնկրետ տեղում երևացնելու;
     */
    public function getPosition($position)
    {
        switch ($position) {
            case self::POSITION_TOP:
                echo self::POSITION_TOP;
                break;
            case self::POSITION_BOTTOM:
                echo self::POSITION_BOTTOM;
                break;
            default:
                echo false;
        }
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'chartable');
    }



}

