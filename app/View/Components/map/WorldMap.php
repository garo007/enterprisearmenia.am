<?php
namespace App\View\Components\map;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class WorldMap extends Component
{
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        //$map = Map::find($this->id);
        //$map ? $this->map = $map : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
         $map = Map::find($this->id);

         $map->data;
         $map->name;
        return view('components.map.world_map',compact('map'));
    }
}

