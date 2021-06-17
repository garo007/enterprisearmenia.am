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
<!-- Chart code -->
<script>
    am4core.ready(function() {

// Themes begin
        am4core.useTheme(am4themes_spiritedaway);
        am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
        @php
            $rand = 'chartdiv_'.rand(1, 10000000)
        @endphp
        var chart = am4core.create("{{$rand}}", am4charts.XYChart);

// Add datas
        const json=  @json($chart2->data);
        var dta= JSON.parse(json);

        chart.data = dta;
            /*[{
            "ax": 1,
            "ay": 0.5,
            "bx": 1,
            "by": 2.2
        }, {
            "ax": 2,
            "ay": 1.3,
            "bx": 2,
            "by": 4.9
        }, {
            "ax": 3,
            "ay": 2.3,
            "bx": 3,
            "by": 5.1
        }, {
            "ax": 4,
            "ay": 2.8,
            "bx": 4,
            "by": 5.3
        }, {
            "ax": 5,
            "ay": 3.5,
            "bx": 5,
            "by": 6.1
        }, {
            "ax": 6,
            "ay": 5.1,
            "bx": 6,
            "by": 8.3
        }, {
            "ax": 7,
            "ay": 6.7,
            "bx": 7,
            "by": 10.5
        }, {
            "ax": 8,
            "ay": 8,
            "bx": 8,
            "by": 12.3
        }, {
            "ax": 9,
            "ay": 8.9,
            "bx": 9,
            "by": 14.5
        }, {
            "ax": 10,
            "ay": 9.7,
            "bx": 10,
            "by": 15
        }, {
            "ax": 11,
            "ay": 10.4,
            "bx": 11,
            "by": 18.8
        }, {
            "ax": 12,
            "ay": 11.7,
            "bx": 12,
            "by": 19
        }];*/

// Create axes
        var valueAxisX = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxisX.title.text = 'X Axis';
        valueAxisX.renderer.minGridDistance = 40;

// Create value axis
        var valueAxisY = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxisY.title.text = 'Y Axis';

// Create series
        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.valueY = "value1";
        lineSeries.dataFields.valueX = "data";
        lineSeries.strokeOpacity = 0;

        var lineSeries2 = chart.series.push(new am4charts.LineSeries());
        lineSeries2.dataFields.valueY = "value3";
        lineSeries2.dataFields.valueX = "value2";
        lineSeries2.strokeOpacity = 0;

// Add a bullet
        var bullet = lineSeries.bullets.push(new am4charts.Bullet());

// Add a triangle to act as am arrow
        var arrow = bullet.createChild(am4core.Triangle);
        arrow.horizontalCenter = "middle";
        arrow.verticalCenter = "middle";
        arrow.strokeWidth = 0;
        arrow.fill = chart.colors.getIndex(0);
        arrow.direction = "top";
        arrow.width = 12;
        arrow.height = 12;

// Add a bullet
        var bullet2 = lineSeries2.bullets.push(new am4charts.Bullet());

// Add a triangle to act as am arrow
        var arrow2 = bullet2.createChild(am4core.Triangle);
        arrow2.horizontalCenter = "middle";
        arrow2.verticalCenter = "middle";
        arrow2.rotation = 180;
        arrow2.strokeWidth = 0;
        arrow2.fill = chart.colors.getIndex(3);
        arrow2.direction = "top";
        arrow2.width = 12;
        arrow2.height = 12;

//add the trendlines
        var trend = chart.series.push(new am4charts.LineSeries());
        trend.dataFields.valueY = "value2";
        trend.dataFields.valueX = "value";
        trend.strokeWidth = 2
        trend.stroke = chart.colors.getIndex(0);
        trend.strokeOpacity = 0.7;
        trend.data = [
            { "value": 1, "value2": 2 },
            { "value": 12, "value2": 11 }
        ];

        var trend2 = chart.series.push(new am4charts.LineSeries());
        trend2.dataFields.valueY = "value2";
        trend2.dataFields.valueX = "value";
        trend2.strokeWidth = 2
        trend2.stroke = chart.colors.getIndex(3);
        trend2.strokeOpacity = 0.7;
        trend2.data = [
            { "value": 1, "value2": 1 },
            { "value": 12, "value2": 19 }
        ];

//scrollbars
        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarY = new am4core.Scrollbar();

        chart.legend = new am4charts.Legend();
        chart.language.locale = am4lang_en_US;
        chart.language.locale = am4lang_en_AM;
        chart.language.locale = am4lang_en_RU;
    }); // end am4core.ready()
</script>

<!-- HTML -->
<div class="container">
    <h2 class="text-center">{{ $chart2->name }}</h2>
    <div id="{{$rand}}" class="vigen"></div>
</div>
