<?php
include_once('class.database.php');
include_once('class.semaforo.php');

function post($key) {
    if (isset($_REQUEST[$key]))
        return $_REQUEST[$key];
    return false;
}

$ids=post('ids');
if (strpos($ids,',') !== false) {
    $ids=substr ( $ids, 0, strlen($ids)-1 );
}

$db = Database::getConnection(); 
$sql = "SELECT * FROM cad_semaforo WHERE cad_semaforo.id IN ($ids)";

function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}

?>

<script type="text/javascript">
//< ![CDATA[
function load() {
if (GBrowserIsCompatible()) {
var map = new GMap2(document.getElementById("map"));
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.addControl(new GOverviewMapControl());
map.setCenter(new GLatLng(-8.088334358688655,-34.91230802536011), 12);
map.addControl(new GScaleControl());
var baseIcon = new GIcon(G_DEFAULT_ICON);
baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
baseIcon.iconSize = new GSize(20, 34);//era 20, 34
baseIcon.shadowSize = new GSize(37, 34);//era 37,34
baseIcon.iconAnchor = new GPoint(9, 34);//9,34
baseIcon.infoWindowAnchor = new GPoint(9, 2);
function createMarker(point, index, semaf) {
var letter = String.fromCharCode("A".charCodeAt(0) + index);//define o nome do icone
var letteredIcon = new GIcon(baseIcon);
letteredIcon.image = "sema.gif";//"http://www.google.com/mapfiles/marker" + letter + ".png";
markerOptions = { icon:letteredIcon };
var marker = new GMarker(point, markerOptions);
GEvent.addListener(marker, "click", function() {
marker.openInfoWindowHtml("Sem&aacute;foro: <b>" + semaf +"<p>"+"STATUS: "+ "ATENDIMENTO" + "</b>");
}
);
return marker;
}
function createMarkerPR(point, index, semaf) {
var letter = String.fromCharCode("A".charCodeAt(0) + index);//define o nome do icone
var letteredIcon = new GIcon(baseIcon);
letteredIcon.image = "pt_ref.gif";//"http://www.google.com/mapfiles/marker" + letter + ".png";
markerOptions = { icon:letteredIcon };
var marker = new GMarker(point, markerOptions);
GEvent.addListener(marker, "click", function() {
marker.openInfoWindowHtml("Ponto De Refer&ecirc;ncia: <b><p>" + semaf +"</b>");
}
);
return marker;
}
var bounds = map.getBounds();
var southWest = bounds.getSouthWest();
var northEast = bounds.getNorthEast();
var lngSpan = northEast.lng() - southWest.lng();
var latSpan = northEast.lat() - southWest.lat();

GEvent.addListener(map,'click',function(overlay, point) {
	if (point != null) {
	  if($('#latitude').length)
		$(latitude).val(point.lat());
	  if($('#longitude').length)
		$(longitude).val(point.lng());
    } 
	else if (overlay != null) 
    {
	  if($('#latitude').length)
		$(latitude).val(point.lat());
      if($('#longitude').length)
		$(longitude).val(point.lng());
		
    }
});

<?php
$script="";

if ($result = $db->query($sql)) {
	while ($obj = $result->fetch_object()) {	
		$id=$obj->id;
		$semaforo = new semaforo();
		$semaforo->select($id);
		$latitude=$semaforo->latitude;
		$longitude=$semaforo->longitude;
		if(!IsNullOrEmptyString($latitude) && !IsNullOrEmptyString($longitude)){
			$script.="
			var latlng = new GLatLng($latitude,$longitude);
			map.addOverlay(createMarker(latlng, 0,\"006\"));
			";
		}
	}
}

echo $script;
?>
map.setCenter(new GLatLng(-8.277852510903883,-35.96824049949646), 12);

}
}
//]>
</script>
<center>
<div id="map" style="width: 564px; height: 294px"></div>
</center>
<script>
$('document').ready(function(){load();});
</script>

