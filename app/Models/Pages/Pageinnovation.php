<?php

namespace App\Models\Pages;

use App\Models\BaseModel;
use App\Models\Chart;
use App\Models\ImageOptimization;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Config;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\App;

class Pageinnovation extends BaseModel implements Searchable
{

    use HasSlug, HasTranslations;
    protected $table = 'pageinnovations';
    protected $fillable = ['page_img','page_img_mini','name','slug','text_top','chart_text_top_id','text_middle_left','chart_text_middle_left_id','chart_text_middle_right_id','text_middle_right','text_bottom','chart_text_bottom_id','page_img_middle','text_bottom','meta_desc','keywords',];
    protected $translatable = ['name','text_top','text_middle_left','text_middle_right','text_bottom','meta_desc','keywords',
    'chart_text_top_id','chart_text_middle_left_id','chart_text_middle_right_id','chart_text_bottom_id',
    ];

    public function getSearchResult(): SearchResult
    {
        $url = 'site.pageinnovations.showById';
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }



    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function charts()
    {
        return $this->morphToMany(Chart::class,'chartable')->withPivot('id','post_position');
    }


    public function storePageImage($request)
    {
        if($request->delete_page_img){
            $this->page_img = null;
        }
        if ($request->hasFile('page_img')) {
            //$this->page_img = ImageOptimization::imageCropSave($request->page_img, config::get('settings.talent.page_img.height'),config::get('settings.talent.page_img.width'), storage_path('app/public/images'));
            $this->page_img = ImageOptimization::imageStoreNoOptimize($request->page_img,  storage_path('app/public/images'));
        }
        $this->save();
    }

    public function storePageImageMini($request)
    {
        if($request->delete_page_img_mini){
            $this->page_img_mini = null;
        }
        if ($request->hasFile('page_img_mini')) {
           // $this->page_img_mini = ImageOptimization::imageCropSave($request->page_img_mini, config::get('settings.talent.page_img_mini.height'),config::get('settings.talent.page_img_mini.width'), storage_path('app/public/images'));
            $this->page_img_mini = ImageOptimization::imageStoreNoOptimize($request->page_img_mini,storage_path('app/public/images'));
        }
        $this->save();
    }


    public function storePageImageMiddle($request)
    {
        if($request->delete_page_img_middle){
            $this->page_img_middle = null;
        }
        if ($request->hasFile('page_img_middle')) {
         //   $this->page_img_middle = ImageOptimization::imageCropSave($request->page_img_middle, 316, 715, storage_path('app/public/images'));
            $this->page_img_middle = ImageOptimization::imageStoreNoOptimize($request->page_img_middle,storage_path('app/public/images'));
        }
        $this->save();
    }

    public function chartTextTop()
    {
        return $this->belongsTo(Chart::class,'chart_text_top_id','id')->where(['lang' => App::getLocale()]);
    }

    //chart_text_middle_left_id
    public function chartTextMiddleLeft()
    {
        return $this->belongsTo(Chart::class,'chart_text_middle_left_id','id')->where(['lang' => App::getLocale()]);
    }

    public function chartTextMiddleRight()
    {
        return $this->belongsTo(Chart::class,'chart_text_middle_right_id','id')->where(['lang' => App::getLocale()]);
    }

    public function chartTextBottom()
    {
        return $this->belongsTo(Chart::class,'chart_text_bottom_id','id')->where(['lang' => App::getLocale()]);
    }


}