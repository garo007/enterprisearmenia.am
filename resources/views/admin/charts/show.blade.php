<?php
$typ =$type;
if($typ=='bar-and-line') {
?>
<x-charts.chart-bar-and-line :id="$id"></x-charts.chart-bar-and-line>
<?php
}
elseif ($typ=='sorted-bar-chart'){
?>
<x-charts.sorted-bar-chart :id="$id"></x-charts.sorted-bar-chart>
<?php
}
elseif ($typ=='column-with-rotated-series'){
?>
<x-charts.column-with-rotated-series :id="$id"></x-charts.column-with-rotated-series>
<?php
}
elseif ($typ=='stacked-column-chart-100'){
?>
<x-charts.stacked-column-chart-100 :id="$id"></x-charts.stacked-column-chart-100>
<?php
}elseif ($typ=='clustered-column-chart'){
?>
<x-charts.clustered-column-chart :id="$id"></x-charts.clustered-column-chart>
<?php
}
elseif ($typ=='simple-pie-chart'){
?>
<x-charts.simple-pie-chart :id="$id"></x-charts.simple-pie-chart>
<?php
}
elseif ($typ=='pie-chart-3d'){
?>
<x-charts.pie-chart-3d :id="$id"></x-charts.pie-chart-3d>
<?php
}
elseif ($typ=='pie-chart-with-legend'){
?>
<x-charts.pie-chart-with-legend :id="$id"></x-charts.pie-chart-with-legend>
<?php
}
elseif ($typ=='live-radar'){
?>
<x-charts.live-radar :id="$id"></x-charts.live-radar>
<?php
}
elseif ($typ=='scatter-chart'){
?>
<x-charts.scatter-chart :id="$id"></x-charts.scatter-chart>
<?php
}
?>
