
<?php
include 'db_conn.php';
include 'Store_User_Pass.php';

date_default_timezone_set("America/New_York");
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d');

$sql = "SELECT Days, startTime, endTime FROM timeslots WHERE DateC ='$result'";
$result = $conn->query($sql);
//echo $result->num_rows;
if ($result->num_rows == 0) 
{
   require 'Managing_Database_One.php';
	//echo "Not found";
}



$sql = "SELECT * FROM confirmation WHERE username ='$u'";
$result = $conn->query($sql);
echo $result->num_rows;
if ($result->num_rows > 0) {
		header("Location: Confirmation.php");
	
	
	
}
else {

	header("Location: Laundry_Schedule_Menu.php");
	}









?>