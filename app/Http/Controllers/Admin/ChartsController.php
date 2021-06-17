<?php

namespace App\Http\Controllers\Admin;


use App\Models\Chartable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Str;
use App\Models\Chart;

class ChartsController extends AdminController
{
    public $chartService;

    function __construct()
    {
        $this->middleware('permission:charts-list');
        $this->middleware('permission:charts-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:charts-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:charts-delete', ['only' => ['destroy']]);
        parent::__construct();
    }


    public function index(Request $request)
    {
        $query = Chart::orderByDesc('id');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        $posts = $query->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.charts.index')->with([
            'title' => 'Գրաֆիկներ',
            'posts' => $posts,
            'chart' => Chart::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Chart::all();

        return view('admin.charts.create')->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'data' => 'required|min:1',
            'value' => 'required|min:1'
        ]);*/
        $arrData = '';
        $series = json_encode([""]);
        $color='';
        $color_line='';
        if ($request->type == 'sorted-bar-chart' || $request->type == 'column-with-rotated-series' || $request->type == 'simple-pie-chart' || $request->type == 'pie-chart-3d' || $request->type == 'pie-chart-with-legend' || $request->type == 'live-radar') {

            $data = explode("/", $request->data);
            $value = explode("/", $request->value);
            if( count($data)!=count($value) )
                return back()->with(['warning' => 'X արժեքների և Y արժեքների քանակը հավասար չէ'])->withInput();

            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['labels'] = $value[$i];
            }
            $arrData = json_encode($arr);
        } elseif ($request->type == 'bar-and-line') {

            $data = explode("/", $request->data);
            $value = explode("/", $request->value);
            $expenses = explode("/", $request->expenses);
            if( count($data)!=count($value) || count($data)!=count($expenses) || count($value)!=count($expenses) )
                return back()->with(['warning' => 'X արժեքների և Y արժեքների կամ Գիծի քանակը հավասար չէ'])->withInput();

            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['income'] = $value[$i];
                $arr[$i]['expenses'] = $expenses[$i];
            }
            $arrData = json_encode($arr);
        } elseif ($request->type == 'scatter-chart') {
            $data = explode("/", $request->data);
            $value1 = explode("/", $request->value1);
            $value2 = explode("/", $request->value2);
            $value3 = explode("/", $request->value3);
            if( count($data)!=count($value1) || count($data)!=count($value2) || count($data)!=count($value3) || count($value1)!=count($value2) || count($value1)!=count($value3) || count($value2)!=count($value3))
                return back()->with(['warning' => 'AX, AY, BX, BY արժեքների քանակը հավասար չէ'])->withInput();

            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['value1'] = $value1[$i];
                $arr[$i]['value2'] = $value2[$i];
                $arr[$i]['value3'] = $value3[$i];
            }
            $arrData = json_encode($arr);
        }

        elseif ($request->type == 'clustered-column-chart' || $request->type == 'stacked-column-chart-100') {
            $data = explode("/", $request->data);
            $value1 = explode("/", $request->value1);
            $arr = array();
            $ser = array();
            for ($i = 0; $i < count($data); $i++) {
                $row = [
                    "data" => $data[$i],
                ];
                $ser[$i] = $series[$i];
                $valuesKey = $i+1;
                $values = explode("/", $request->get("value$valuesKey"));
                for($j = 0; $j < count($values); $j++){
                    $columnKey = $j + 1;
                    $row["value$columnKey"] = $values[$j];
                }
                $arr[$i] = $row;
            }
            $arrData = json_encode($arr);
        }
        Chart::create([
            'name' => $request->name,
            'type' => $request->type,
            'data' => $arrData,
            'series' => $request->series,
            'line' => $request->line,
            'lang' => $request->lang,
        ]);

        return redirect()->route('admin.charts.index')
            ->with('success', 'Գրաֆիկը հաջողությամբ ավելացվեց');
    }

    public function showData($id)
    {
        $item = Chart::find($id);

        $charts = new Chart();
        return view('admin.charts.index', ['data' => $charts->find($id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Chart::find($id);

        return view('admin.charts.show')->with([
            'title' => 'Գրաֆիկ',
            'item' => $item,
            'data' => $item->data,
            'type' => $item->type,
            'name' => $item->name,
            'series' => $item->series,
            'id' => $item->id,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = ChartModel::findOrFail($id);

        return view('admin.charts.edit')->with([
            'title' => 'Редактировать Тег',
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'data' => 'required',
            'type' => 'required'
        ]);*/
        $arrData = '';

        $series = json_encode(['']);
        if ($request->type == 'sorted-bar-chart' || $request->type == 'column-with-rotated-series' || $request->type == 'simple-pie-chart' || $request->type == 'pie-chart-3d' || $request->type == 'pie-chart-with-legend' || $request->type == 'live-radar') {

            $data = explode("/", $request->data);
            $value = explode("/", $request->value);
            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['labels'] = $value[$i];
            }
            $arrData = json_encode($arr);

        } elseif ($request->type == 'scatter-chart') {
            $data = explode("/", $request->data);
            $value1 = explode("/", $request->value1);
            $value2 = explode("/", $request->value2);
            $value3 = explode("/", $request->value3);
            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['value1'] = $value1[$i];
                $arr[$i]['value2'] = $value2[$i];
                $arr[$i]['value3'] = $value3[$i];
            }
            $arrData = json_encode($arr);
        }
        elseif ($request->type == 'clustered-column-chart' || $request->type == 'stacked-column-chart-100') {
            $data = explode("/", $request->data);
            $value1 = explode("/", $request->value1);
            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $row = [
                    "data" => $data[$i],
                ];

                $valuesKey = $i+1;
                $values = explode("/", $request->get("value$valuesKey"));
                for($j = 0; $j < count($values); $j++){
                    $columnKey = $j + 1;
                    $row["value$columnKey"] = $values[$j];
                }
                $arr[$i] = $row;

            }
            $arrData = json_encode($arr);
        }
        elseif ($request->type == 'bar-and-line') {
            $data = explode("/", $request->data);
            $value = explode("/", $request->value);
            $expenses = explode("/", $request->expenses);

            $arr = array();
            for ($i = 0; $i < count($data); $i++) {
                $arr[$i]['data'] = $data[$i];
                $arr[$i]['income'] = $value[$i];
                $arr[$i]['expenses'] = $expenses[$i];
            }
            $arrData = json_encode($arr);
        }
        $chart = Chart::findOrFail($id);
        $chart->name = $request->name;
        $chart->data = $arrData;
        $chart->type = $request->type;
        $chart->series = $request->series;
        $chart->line = $request->line;
        $chart->save();
        return back()->with(['success' => 'Թարմացվել է']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chart::findOrFail($id)->delete();
        return redirect()->route('admin.charts.index')
            ->with('success', 'Գրաֆիկը հաջողությամբ ջնջվեց');
    }

    public function deleteChart($id)
    {
        Chart::findOrFail($id)->delete();
        return redirect()->route('admin.charts.index')->with(['success' => 'Գրաֆիկը հաջողությամբ ջնջվեց']);
    }

    public function editChart($id)
    {

        $chart = Chart::findOrFail($id);
        //$namejson = (json_decode($chart->name, true));
        $datajson = (json_decode($chart->data, true));

//        $count = [];
//        foreach ($datajson as $i) {
//            $count[] = count($i) - 1;
//        }

        $type = $chart->type;
        $name = $chart->name;

        if ($type == 'sorted-bar-chart' || $type == 'column-with-rotated-series' || $type == 'simple-pie-chart' || $type == 'pie-chart-3d' || $type == 'pie-chart-with-legend' || $type == 'live-radar') {
            $data = array();
            $labels = array();
            foreach ($datajson as $value) {
                $data[] = $value['data'];
                $labels[] = $value['labels'];
            }

            return view('admin.charts.edit')->with([
                'title' => 'Գրաֆիկ',
                'data' => $data,
                'labels' => $labels,
                'type' => $type,
                'name' => $name,
                'id' => $id,
            ]);
        } elseif ($type == 'scatter-chart') {
            $data = array();

            foreach ($datajson as $value) {
                $data[] = $value['data'];

                $value1[] = $value['value1'];
                $value2[] = $value['value2'];
                $value3[] = $value['value3'];
            }
            return view('admin.charts.edit')->with([
                'title' => 'Գրաֆիկ',
                'data' => $data,
                'value1' => $value1,
                'value2' => $value2,
                'value3' => $value3,
                'type' => $type,
                'name' => $name,
                'id' => $id,
            ]);
        } elseif ($type == 'clustered-column-chart' || $type == 'stacked-column-chart-100') {
            $data = array();
            $arrvalue = array();
            foreach ($datajson as $i => $value) {

                $data[] = $value['data'];
                $arrvalue["value".($i+1)] = array_slice(array_values($value), 1);

            }
            $series = $chart->series;
            return view('admin.charts.edit')->with([
                'title' => 'Գրաֆիկ',
                'data' => $data,
                'datajson' => $arrvalue,
                'type' => $type,
                'name' => $name,
                'series' => $series,
                'id' => $id,
            ]);
        } else {
            $income = array();
            $labels = array();
            $expenses = array();
            $series = $chart->series;
            $line = $chart->line;
            foreach ($datajson as $value) {
                $data[] = $value['data'];
                $expenses[] = $value['expenses'];
                $income[] = $value['income'];
            }

            return view('admin.charts.edit')->with([
                'title' => 'Գրաֆիկ',
                'income' => $income,
                'data' => $data,
                'expenses' => $expenses,
                'line' => $line,
                'series' => $series,
                'type' => $type,
                'name' => $name,
                'id' => $id,
            ]);
        }

    }


    public function deleteChartable(Request $request)
    {
        $id = $request->id;
        Chartable::find($id)->delete();
        return $id;
    }

}
