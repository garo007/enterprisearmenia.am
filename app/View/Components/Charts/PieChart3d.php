<?php

namespace App\View\Components\Charts;

use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class PieChart3d extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id=$id;
        //
    }
    /**
     *
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $chart2=Chart::find($this->id);
        $chart2->data;
        $chart2->name;

        return view('components.charts.pie-chart-3d',compact('chart2'));
    }
}
