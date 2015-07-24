<!DOCTYPE html>
<html>
  <head>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="/callmap.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="db/codeAddress.js"></script>
  </head>
  <body>
    <?php require 'headerbar.php'; ?>
    <?php
      require 'db/connect.php';	//Connect to DB
      require 'db/list_data.php';
    ?>
  </body>
</html>
