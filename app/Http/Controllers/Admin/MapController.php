<?php

namespace App\Http\Controllers\Admin;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class MapController extends AdminController
{
    function __construct()
    {
        $this->middleware('permission:map-list');
        $this->middleware('permission:map-create', ['only' => ['create','store']]);
        $this->middleware('permission:map-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:map-delete', ['only' => ['destroy']]);
        parent::__construct();
    }


    public function index(Request $request)
    {
        $query = Map::orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        $posts = $query->orderBy('id','desc')
            ->paginate(20);

        return view('admin.map.index')->with([
            'title' => 'Քարտեզ',
            'posts' => $posts,
            'map' => Map::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.map.create')->with([
            'title' => 'Добавить тег',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $lang = $request->lang;
        $name = $request->name;
        $arr=array();
        for($i = 0; $i<count($title); $i++){
            $arr[$i]['title'] = $title[$i];
            $arr[$i]['latitude'] = $request->latitude[$i];
            $arr[$i]['longitude'] = $request->longitude[$i];
            $arr[$i]['color'] = 'colorSet.next()';
        }
        $arr_data = json_encode($arr);
        Map::create([
            'data' => $arr_data,
            'lang' => $lang,
            'name' => $name,

        ]);
        return redirect()->route('admin.map.index')
            ->with('success', 'Հաջողությամբ ավելացվեց');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map = Map::findOrFail($id);
        return view('admin.map.show')->with([
            'id' => $id,
            'data' => $map->data,
            'name' => $map->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Map::findOrFail($id);
        return view('admin.map.edit')->with([
            'title' => 'Редактировать Тег',
            'post' => $post,
        ]);
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
        $title = $request->title;
        $arr=array();
        for($i = 0; $i<count($title); $i++){
            $arr[$i]['title'] = $title[$i];
            $arr[$i]['latitude'] = $request->latitude[$i];
            $arr[$i]['longitude'] = $request->longitude[$i];
            $arr[$i]['color'] = 'colorSet.next()';
        }
        $arr_data = json_encode($arr);
        $map = Map::findOrFail($id);
        $map->data = $arr_data;
        $map->lang = $request->lang;
        $map->name = $request->name;
        $map->save();
        return back()->with(['success' => 'Թարմացվել է']);
    }
    /**
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Map::findOrFail($id)->delete();
        return redirect()->route('admin.map.index')
            ->with('success','Запись успешно удален');
    }
    public function showData($id)
    {
        $item = Map::find($id);
        $maps = new map();
        return view('admin.map.index', ['data' => $maps->find($id)]);
    }
    public function editMap($id)
    {

        $map = Map::findOrFail($id);
        $id = $map->id;
        $lang = $map->lang;
        $name = $map->name;
        $datajson = (json_decode($map->data, true));
        return view('admin.map.edit')->with([
            'title' => 'Քարտեզ',
            'id' => $id,
            'datajson' => $datajson,
            'lang' => $lang,
            'name' => $name,
        ]);


    }


}
