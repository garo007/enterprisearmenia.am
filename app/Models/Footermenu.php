<?php

namespace App\Models;

use App\Enums\FooterMenusEnum;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class Footermenu extends BaseModel
{
    protected $table = 'footermenus';
    protected $fillable = ['parent','type', 'lang', 'title', 'path',];

    public static function getMenus($lang, $type)
    {
        return (array) DB::select("SELECT * FROM footermenus WHERE lang = '$lang' AND type ='$type'");
    }

    public static function storeTopMenu($request)
    {
        $input = $request->all();
        $input['type'] = FooterMenusEnum::top();
        return self::create($input);
    }

    public static function storeBottomMenu($request)
    {
        $input = $request->all();
        $input['type'] = FooterMenusEnum::bottom();
        return self::create($input);
    }

    public static function storeSocialLinksMenu($request)
    {
        $input = $request->all();
        $input['type'] = FooterMenusEnum::social();
        return self::create($input);
    }


    public function getAge($x)
    {
        return $x;
    }

}

