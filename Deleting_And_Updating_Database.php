<?php 

  include 'Store_User_Pass.php';
    
	$Found = $_POST['ETime'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	$Date;
	$Day;
	$sTime;
	$ETime;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM timeslots WHERE Uid ='$Found'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$Date = $row["DateC"];
	$Day = $row["Days"];
	$sTime= $row["startTime"];
	$ETime= $row["endTime"];
	  
	  
		$stmt = $conn->prepare("INSERT INTO confirmation (username,Unitno, Name,DateC, Days, startTime, endTime) VALUES (?, ?, ?,?,?,?,?)");
		$stmt->bind_param("sssssss",$username,$Unitno,$Name, $DateC, $Days, $startTime, $endTime);

		// set parameters and execute
		    $username = $u;
			$Unitno = $ap;
			$Name = $n;
			$DateC = $Date;
			$Days = $Day;
			$startTime = $sTime;
			$endTime = $ETime;
			$stmt->execute();

$stmt->close();
    //echo "Date: " . $row["DateC"]. " - Day: " . $row["Days"]. " TimeSlot: " . $row["startTime"]. " - ".$row["endTime"]. "<br>";
  }
} else {
}
$sql1 = "DELETE FROM timeslots WHERE Uid ='$Found'";

$result1 = $conn->query($sql1);
$conn->close();

header("Location: Confirmation.php");
?>