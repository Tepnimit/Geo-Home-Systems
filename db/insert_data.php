<?php 
$meal_name = $_POST["meal_name"];
$desc = $_POST["desc"];
$location = $_POST["location"];


$sql = "INSERT INTO meal (meal_name, meal_desc, location)
	VALUES ('$meal_name', '$desc', '$location')";

if ($conn->query($sql) === TRUE){
        echo "Created Successfully";
        echo $sql . "<br>";
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
