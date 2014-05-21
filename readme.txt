KmlPainter v1.0a
=================================================

WHAT IT DOES
=================================================
KmlPainter is a simple PHP application that helps visualize points or polygons in a map, it does that
by painting all the points in google maps interface and can also load external (publicly accessible) kml
files.
It works with multiple layers and multiple kml files.

USAGE EXAMPLES
=================================================

General instructions:
----------------------
All shapes or files are called with GET requests, which then
returns a url with the map and the shapes painted on it, or
the kml files loaded along with the shapes.

=================================================

Simple shapes on a map
-----------------------

EXAMPLE:
--------
map.php?strokeColor=FFF000&fillColor=FF00FF&centerCoords=25.774252,-80.190262&coords=25.774252,-80.190262;18.466465,-66.118292;32.321384,-64.75737;25.774252,-80.190262;

strokeColor = the outline color of the shape.
fillColor = the color that is used to fill the shape.
centerCoords = the coordinates where the map will center.


Painting on top of KML files
----------------------------

EXAMPLE:
--------
map.php?strokeColor=FF0000&fillColor=FF00FF&centerCoords=25.774252,-80.190262&coords=25.774252,-80.190262;18.466465,-66.118292;32.321384,-64.75737;25.774252,-80.190262;&kmlFiles=http://83.212.124.59/map/ethikoi_drymoi.kml;http://83.212.124.59/map/ektos.kml

strokeColor = the outline color of the shape.
fillColor = the color that is used to fill the shape.
centerCoords = the coordinates where the map will center.
kmlFiles = a list of the kml files to load as layers, split them with ";".






