<?php 
// Include the database config file 
include_once 'Managing_Database_Two.php';
 
 
if(!empty($_POST["id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM daysname WHERE id = ".$_POST['id']."  AND DateC >= current_date()" ; 
    $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Day</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'">'.$row['Days'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Day not available</option>'; 
    } 
}elseif(!empty($_POST["did"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT Uid,DateC,Days, TIME_FORMAT(startTime, '%h:%i %p') AS startTime, TIME_FORMAT(endTime, '%h:%i %p') AS endTime ,id FROM timeslots WHERE (id = ".$_POST['did']." AND ((DateC >= current_date() and endTime >= current_time()) or DateC > current_date()))"; 
    $result = $conn->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select the Starting Time</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['Uid'].'">'.$row['startTime'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Timeslot not available</option>'; 
    } 
} elseif(!empty($_POST["didi"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT Uid,DateC,Days, TIME_FORMAT(startTime, '%h:%i %p') AS startTime, TIME_FORMAT(endTime, '%h:%i %p') AS endTime FROM timeslots WHERE Uid = ".$_POST['didi'].""; 
    $result = $conn->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['Uid'].'">'.$row['endTime'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Timeslot not available</option>'; 
    } 
}
?>