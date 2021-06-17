<style>
    #chartdiv {
        width: 100%;
        height: 500px;
        overflow: hidden;
    }
    .name_map{
        font: caption;
        color: #8B1C30;
        text-align: center;
        font-size: 33px;
        font-weight: 300;
    }
</style>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    am4core.ready(function() {

// Themes begin
        am4core.useTheme(am4themes_animated);
// Themes end

// Create map instance
        var chart = am4core.create("chartdiv", am4maps.MapChart);

// Set map definition
        chart.geodata = am4geodata_worldLow;

// Set projection
        chart.projection = new am4maps.projections.Miller();

// Create map polygon series
        var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

// Exclude Antartica
        polygonSeries.exclude = ["AQ"];

// Make map load polygon (like country names) data from GeoJSON
        polygonSeries.useGeodata = true;

// Configure series
        var polygonTemplate = polygonSeries.mapPolygons.template;
        polygonTemplate.tooltipText = "{name}";
        polygonTemplate.polygon.fillOpacity = 0.6;


// Create hover state and set alternative fill color
        var hs = polygonTemplate.states.create("hover");
        hs.properties.fill = chart.colors.getIndex(0);

// Add image series
        var imageSeries = chart.series.push(new am4maps.MapImageSeries());
        imageSeries.mapImages.template.propertyFields.longitude = "longitude";
        imageSeries.mapImages.template.propertyFields.latitude = "latitude";
        imageSeries.mapImages.template.tooltipText = "{title}";
        imageSeries.mapImages.template.propertyFields.url = "url";

        var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
        circle.radius = 3.5;
        circle.propertyFields.fill = "color";

        var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
        circle2.radius = 5;
        circle2.propertyFields.fill = "color";


        circle2.events.on("inited", function(event){
            animateBullet(event.target);
        })


        function animateBullet(circle) {
            var animation = circle.animate([{ property: "scale", from: 1, to: 3 }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
            animation.events.on("animationended", function(event){
                animateBullet(event.target.object);
            })
        }
        var colorSet = new am4core.ColorSet();
        @php
            $url = url()->current();
            $url_id = explode('/', $url);
            $idmap = end($url_id);
            use Illuminate\Support\Facades\DB;
                $qartez = DB::select("select * from map where id='$idmap'");
                    foreach ($qartez as $qartez) {
                        $dta = $qartez->data;
                        $name = $qartez->name;
                    }
        @endphp
        var d1 = @json($dta);
    var dta = JSON.parse(d1);

    var arr = [];
        for(var j of dta){
            arr.push(
                {
                    "title" : j.title,
                    "latitude" : j.latitude*1,
                    "longitude" : j.longitude*1,
                    "color" : colorSet.next(),
                }
                )
        }
            imageSeries.data = arr;

    }); // end am4core.ready()
</script>

<div class="container-fluid">
    <h2 class="text-center name_map">
            {{$name}}
    </h2>
    <br>
    <br>
    <div id="chartdiv"></div>
</div>
