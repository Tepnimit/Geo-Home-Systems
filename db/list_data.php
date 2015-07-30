<!DOCTYPE html>
<html>
  <head>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="codeAddress2.js"></script>
   </head>
  <body>
    <?php
      require 'connect.php';
        $sql = "SELECT * FROM meal";
        $result = $conn->query($sql);
    ?>
      <br>
      <p> Click here for full map:
        <a href="map.php">
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
              <?php if ($result->num_rows > 0) {
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
                       <script type="text/javascript">
                         var address = '<?php echo $row["location"];?>';
                         var count = '<?php echo $count;?>';
                       </script>
                       <div id='map-canvas<?php echo $count;?>' style="width:200px;height:150px;"></div>
                       <script type="text/javascript">codeAddress(count,address); </script>
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

