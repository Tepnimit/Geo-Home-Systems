<!DOCTYPE html>
<html>
	<head>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script src="/callmap.js"></script>
	</head>
	<body>

		print "Welcome Page";

		<?php
		require 'db/connect.php';	//Connect to DB
		require 'db/insert_data.php';
		require 'db/list_data.php';
		?>
</body>
</html>
