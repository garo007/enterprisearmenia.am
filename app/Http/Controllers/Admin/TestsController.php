<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostsEnum;
use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use App\Models\Post;
use Illuminate\Http\Request;

use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Config;

class TestsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        dd(config::get('settings.talent.page_img_mini.height'));
        dd(config::get('settings.talent.page_img_mini.width'));
        /*Test*/
        exit('777');
        /*Testend*/
       dd(config::get('settings.talent.page_img.height'));
       dd(config::get('settings.talent.page_img.width'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
