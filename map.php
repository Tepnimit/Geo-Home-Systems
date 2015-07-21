<!DOCTYPE html>
<html>
<head>
<title>Maps Multiple Markers</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://maps.googleapis.com/maps/api/js"></script>
</head>

<body>
  <?php require 'headerbar.php'; ?>
<div id="googleMap" style="width:700px;height:380px;"></div>
<?php
	print "Map Page ";
	require 'db/connect.php';
?><br>
<script>var locations = []; </script>
<?php
	$sql = "SELECT location from meal";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$count += 1;
			$latlng = $row["location"];
			$latlng = preg_split("[,]", $latlng);
			echo $count . " : " ;
			echo $latlng[0] . "," . $latlng[1] ;

	//$locate[] = [$latlng[0],$latlng[1]];
	?><br> 
	

			<script type="text/javascript"> 
			var lat="<?php echo $latlng[0];?>";
			var lng="<?php echo $latlng[1];?>";
			var count=<?php echo $count-1;?>;

locations.push([lat,lng]);

			
//alert(locate);
		</script>
			<?php
		}
	}
?>
			<script type="text/javascript">
//initialize();
alert(locations);

			 // var myCenter<?php echo $count;?> = new google.maps.LatLng(lat,lng);
			  var map = new google.maps.Map(document.getElementById("googleMap"), {
			    zoom: 2,
   			    center: new google.maps.LatLng(38.879970, -77.106770),
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			  });

//			  var infowindow = new google.maps.InfoWindow();
		for (i=0; i<locations.length; i++) {

			  var myCenter = new google.maps.LatLng(locations[i][0],locations[i][1]);

			  marker = new google.maps.Marker({
				position: myCenter,
				map: map
			  });
		}
//alert(myCenter<?php echo $count;?>);
//			  marker.setMap(map);
			  ///google.maps.event.addListener(marker, 'click', initialize);
	
//alert("HO HO");
//   var marker, i;
//   for (count = 0; count < 12; count++) {  
//      marker = new google.maps.Marker({
//        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//        map: map
//      });
//  }

//	google.maps.event.addListener(marker, 'click', (
//        function(marker, $count) {
//        	return function() {
//         		infowindow.open(map, marker);
//        	}
 //     	}) (marker, i));

</script>
			
<script>//google.maps.event.addDomListener(window, 'load', initialize);</script>
		<script type="text/javascript">//initialize();</script>
</body>
</html>
