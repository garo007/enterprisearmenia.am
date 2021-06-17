<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FooterMenusEnum;
use App\Http\Controllers\Controller;
use App\Models\Footermenu;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FooterSocialLinksMenusController extends AdminController
{
    public function __construct()
    {

        $this->middleware('permission:menu-list');
        $this->middleware('permission:menu-create', ['only' => ['create','store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);

        parent::__construct();
    }

    public function index(Request $request)
    {

        if($request->isMethod('post')){

            settings()->group('social_links')->set('linkedin_link', $request->linkedin_link);
            settings()->group('social_links')->set('facebook_link', $request->facebook_link);
            settings()->group('social_links')->set('twitter_link', $request->twitter_link);
            settings()->group('social_links')->set('instagram_link', $request->instagram_link);

        }

        $title = 'Սոցիալական ցանցի հղումներ';
        return view('admin.footerSocialLinksMenus.index', compact('title'));

    }


}
