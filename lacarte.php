<html><body>
  <div id="mapdiv"></div>
  <script src="https://openlayers.org/api/OpenLayers.js"></script>

<?php

$LATITUDE = $_POST['latitude'];
$LONGITUDE = $_POST['longitude'];

?>

  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
       
    var pois = new OpenLayers.Layer.Text( "My Points",
                    { location:"./POI.php",
                      projection: map.displayProjection
                    });
    map.addLayer(pois);
 
    //Set start centrepoint and zoom    
    var lonLat = new OpenLayers.LonLat(<?php echo $LATITUDE ?>, <?php echo $LONGITUDE ?> )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
    var zoom=15;
    map.setCenter (lonLat, zoom);  
    
  </script>
</body></html>
