<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title></title>
  <style>
    html, body, #map-canvas {
      height: 100%;
      margin: 0px;
      padding: 0px;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script>

function initialize() {
  var mapOptions = {
    zoom: 5,
    center: new google.maps.LatLng(<?php echo $_GET['centerCoords']; ?>),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

  <?php 

    if (!empty($_GET['kmlFiles'])) {
      $kmlFiles = $_GET['kmlFiles'];
      $kmlFilesArray = explode(";", $kmlFiles);
      $count = 0;

      foreach ($kmlFilesArray as $singleKML) {

        $url = $singleKML;
        $code = "var kmlLayer_" . $count . " = new google.maps.KmlLayer({\n";
        $code = $code . "url: '" .$url. "'});\n";
        $code = $code . "kmlLayer_" . $count . ".setMap(map);\n\n";

        echo $code;

        $count = $count+1;
      }

    }
  ?>

  var userCoords = [

    <?php 
      $shapeCoords = $_GET['coords'];
      $shapeCoordsArray = explode(";", $shapeCoords);

      foreach ($shapeCoordsArray as $localCoords) {
         echo "new google.maps.LatLng(" . $localCoords . "),";
      }
    ?>
  ];

  // Construct the polygon.
  userSchema = new google.maps.Polygon({
    paths: userCoords,
    strokeColor: '#<?php echo $_GET["strokeColor"];?>',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#<?php echo $_GET["fillColor"];?>',
    fillOpacity: 0.35
  });

  userSchema.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>
<body>
  <div id="map-canvas"></div>
</body>
</html>