<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px!important;
    }
</style>

<!-- Resources -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/spiritedaway.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->

<script>
    //var id_chart = 'chartdiv_{{rand(1, 10000000)}}'
    @php
        $rand = 'chartdiv_'.rand(1, 10000000)
    @endphp

    am4core.ready(function() {
// Themes begin
        am4core.useTheme(am4themes_spiritedaway);
        am4core.useTheme(am4themes_animated);
// Themes end
        var chart = am4core.create('{{$rand}}', am4charts.XYChart);
        const json=  @json($chart2->data);
        var dta= JSON.parse(json);
        chart.data = dta;

//create category axis for years
        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "data";
        categoryAxis.renderer.inversed = true;
        categoryAxis.renderer.grid.template.location = 0;

//create value axis for income and expenses
        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.opposite = true;


//create columns
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryY = "data";
        series.dataFields.valueX = "income";
        series.name = "{{$chart2->series}}";
        series.columns.template.fillOpacity = 0.5;
        series.columns.template.strokeOpacity = 0;
        series.tooltipText = "{{$chart2->series}} {categoryY}:{valueX.value}";


//create line
        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.categoryY = "data";
        lineSeries.dataFields.valueX = "expenses";
        lineSeries.name = "{{$chart2->line}}";
        lineSeries.strokeWidth = 3;
        lineSeries.tooltipText = "{{$chart2->line}} {categoryY}:{valueX.value}";


//add bullets
        var circleBullet = lineSeries.bullets.push(new am4charts.CircleBullet());
        circleBullet.circle.fill = am4core.color("#fff");
        circleBullet.circle.strokeWidth = 2;

//add chart cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "zoomY";


//add legend
        chart.legend = new am4charts.Legend();

    }); // end am4core.ready()
</script>

<!-- HTML -->
<div class="container">
    <h2 class="text-center">{{ $chart2->name }}</h2>
    <div id="{{$rand}}" class="vigen"></div>
</div>
