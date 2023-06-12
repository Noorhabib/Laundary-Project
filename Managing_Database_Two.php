


<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

date_default_timezone_set("America/New_York");
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Days, startTime, endTime FROM timeslots WHERE DateC ='$result'";
$result = $conn->query($sql);
//echo $result->num_rows;
if ($result->num_rows == 0) 
{
   require 'Managing_Database_One.php';
	echo "Not found";
}

?>
