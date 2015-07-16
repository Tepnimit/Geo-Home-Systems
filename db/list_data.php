<!DOCTYPE html>
<html>
        <head>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
	</head>
<body>
<?php

		require 'db/connect.php';
                $sql = "SELECT * FROM meal";
                $result = $conn->query($sql);
//print_r($result);
                ?>
                // Draw Table
                <style>
                        table, th, td {
                                border: 1px solid black;
                        }
                </style>
                <table style="width:100%">
                        <tr>
                                <td> ID </td>
                                <td> Meal Name </td>
                                <td> Description </td>
                                <td> Location </td>
                        </tr>
                        <?php if ($result->num_rows > 0) { ?>
                                <tr>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                                $count += 1;
                                                ?>
                                        <tr>
                                                <td> <?php echo $row["meal_id"]; ?> </td>
                                                <td> <?php echo $row["meal_name"]; ?> </td>
                                                <td> <?php echo $row["meal_desc"]; ?> </td>
                                                <td> <?php echo $row["location"]; ?>

                                                        <?php
                                                        $latlng = $row["location"];
                                                        $latlng = preg_split("[,]", $latlng);
                                                        #echo "This is latlng: " . $latlng[0] . " " . $latlng[1];
                                                        ?>
                                                        <script type="text/javascript">
                                                                var lat = "<?php echo $latlng[0]; ?>";
                                                                var lng = "<?php echo $latlng[1]; ?>";
                                                                var myCenter = new google.maps.LatLng(lat, lng);
                                                                function initialize() {
                                                                        var mapProp = {
                                                                                center: myCenter,
                                                                                //center:new google.maps.LatLng(38.847723,-77.131016),
                                                                                zoom: 14,
                                                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                                                        };
                                                                        var map = new google.maps.Map(document.getElementById("googleMap<?php echo $count; ?>"), mapProp);
                                                                        var marker = new google.maps.Marker({position:myCenter});
                                                                        marker.setMap(map);
                                                                }
                                                        //google.maps.event.addDomListener(window, 'load', initialize);
                                                        </script>
                                                        <div id="googleMap<?php echo $count; ?>" style="width:200px;height:150px;"></div>
                                                        <?php
                                                        echo '<script type="text/javascript">initialize();</script>';
                                                        ?>
                                                </td>
                                        </tr>
                                        <?php }
                                ?>
                        </tr>
                        <?php
                } else {
                        echo "0 Results";
                }
                ?>

</body>
</html>

