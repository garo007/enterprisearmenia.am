<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/spiritedaway.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- Chart code --><script>
    am4core.ready(function() {
// Themes begin
        am4core.useTheme(am4themes_spiritedaway);
        am4core.useTheme(am4themes_animated);
// Themes end
        @php
            $rand = 'chartdiv_'.rand(1, 10000000)
        @endphp

        var chart = am4core.create("{{$rand}}", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
        const json=  @json($chart2->data);
        var dta= JSON.parse(json);
        let countcol = Object.keys(dta[0]).length;
        chart.data = dta;
            /*[
            {
                category: "One",
                value1: 1,
                value2: 5,
                value3: 3
            },
            {
                category: "Two",
                value1: 2,
                value2: 5,
                value3: 3
            },
            {
                category: "Three",
                value1: 3,
                value2: 5,
                value3: 4
            },
            {
                category: "Four",
                value1: 4,
                value2: 5,
                value3: 6
            },
            {
                category: "Five",
                value1: 3,
                value2: 5,
                value3: 4
            },
            {
                category: "Six",
                value1: 2,
                value2: 13,
                value3: 1
            }
        ];*/

        chart.colors.step = 2;
        chart.padding(30, 30, 10, 30);
        chart.legend = new am4charts.Legend();

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "data";
        categoryAxis.renderer.grid.template.location = 0;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.min = 0;
        valueAxis.max = 100;
        valueAxis.strictMinMax = true;
        valueAxis.calculateTotals = true;
        valueAxis.renderer.minWidth = 50;

        const series =  @json($chart2->series);
        var ser = series.split("/");
        var j = -1;
        for(var i=1; i<countcol;i++){
            j++
            var str = window['series'+i] = chart.series.push(new am4charts.ColumnSeries());

            /*str = chart.series.push(new am4charts.ColumnSeries());*/
            str.columns.template.width = am4core.percent(80);
            str.columns.template.tooltipText =
                "{name}: {valueY.totalPercent.formatNumber('#.00')}%";
            str.name = ""+ser[j]+"";
            str.dataFields.categoryX = "data";
            str.dataFields.valueY = "value"+i;
            str.dataFields.valueYShow = "totalPercent";
            str.dataItems.template.locations.categoryX = 0.5;
            str.stacked = true;
            str.tooltip.pointerOrientation = "vertical";

            /*var bullet1 = str.bullets.push(new am4charts.LabelBullet());*/
            var bullet = window['bullet'+i] = str.bullets.push(new am4charts.LabelBullet());

            bullet.interactionsEnabled = false;
            bullet.label.text = "{valueY.totalPercent.formatNumber('#.00')}%";
            bullet.label.fill = am4core.color("#ffffff");
            bullet.locationY = 0.5;
        }

        chart.scrollbarX = new am4core.Scrollbar();

    }); // end am4core.ready()
</script>

<!-- HTML -->
<div class="container">
    <h2 class="text-center">{{ $chart2->name }}</h2>
    <div id="{{$rand}}" class="vigen"></div>
</div>
