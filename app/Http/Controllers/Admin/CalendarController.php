<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CalendarController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_json=Post::where('posts_type','events')->where('event_started_date','!=',null)->select('id','event_started_date')->get();
        $events=Post::where('posts_type','events')->where('event_started_date','!=',null)->select('id','event_started_date','name')->where('event_started_date','>',Carbon::now())->get();

        $today = Carbon::now()->format('Y-m-d').'%';
        $eventstoday=Post::where('posts_type','events')->where('event_started_date','!=',null)->where('event_started_date', 'like', $today)->first();

        $post=json_decode($post_json);

        return view('admin.Calendar.index',compact('post','events','eventstoday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findDay($data)
    {
    $post=Post::find($data);

        return view('admin.Calendar.info',compact('post'));

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
