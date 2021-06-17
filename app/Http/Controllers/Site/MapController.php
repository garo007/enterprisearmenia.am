<?php

namespace App\Http\Controllers\Site;

use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;

class MapController extends SiteController
{
    /*function __construct()
    {
        $this->middleware('permission:map-list');
        $this->middleware('permission:map-create', ['only' => ['create','store']]);
        $this->middleware('permission:map-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:map-delete', ['only' => ['destroy']]);
        parent::__construct();
    }*/

    public function show($id)
    {

        $map = Map::findOrFail($id);
        return view('site.map.show')->with([
            'id' => $id,
            'data' => $map->data,
            'name' => $map->name
        ]);
    }


}
