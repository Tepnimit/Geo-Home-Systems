<!DOCTYPE html>
<html>
  <head>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   </head>
  <body>
    <?php
      require 'connect.php';
        $sql = "SELECT * FROM meal";
        $result = $conn->query($sql);
    ?>
      <br>
      <p>Click here for full map:
        <a href="/map.php">
          <button type="button" class="btn btn-default btn-md">
            <span class="glyphicon glyphicon-map-marker"></span> Full Map
          </button>
        </a>
      </p>
      <br>
    <h2> List of all locations </h2>
    <div class="table-responsive" align="center">
      <table class="table">
        <style> table, th, td {border: 0px solid black;} </style>
           <table style="width:75%">
              <?php if ($result->num_rows > 0) { ?>
                  <?php
                    while ($row = $result->fetch_assoc()) {
                      $count += 1;
                  ?>
                  <tr>
                    <td>
                      <br> <!-- Blank -->
                    </td>
                  </tr>
                  <tr>
<!-- Location data -->
                     <td width="25%"> <?php echo $row["location"]; ?>
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
                       <script type="text/javascript">initialize();</script>
                       <?php
                       //echo '<script type="text/javascript">initialize();</script>';
                       ?>
                     </td>

<!-- Other data -->
                     <td>
                       <table class="table">
                         <tr>
                           <td width="25%">ID: </td>
                           <td><?php echo $row["meal_id"]; ?> </td>
                         </tr>
                         <tr>
                           <td width="25%">Name: </td>
                           <td><?php echo $row["meal_name"]; ?> </td>
                         </tr>
                         <tr>
                           <td width="25%">Description: </td>
                           <td><?php echo $row["meal_desc"]; ?> </td>
                         </tr>
                       </table>
                     </td>
<!-- End Row -->
                  </tr>
                  <?php } ?>
              <?php
              } else {
                echo "0 Results";
              }
              ?>
      </table>
    </div>
  </body>
</html>

