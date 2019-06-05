<?php
require_once('connect.php');
require_once('getEntities.php'); 
$e_ID = $_GET['e_ID'];

$query = "SELECT * FROM t_events WHERE e_ID = $e_ID";
$run = mysqli_query($dbc, $query);

if(!$run){
    echo "Error Finding Event Info ".mysqli_error($dbc);
}else{
    while($row = mysqli_fetch_array($run)){
        $eventTitle = $row['e_Title'];
        $eventDate = $row['e_Date'];
        $eventVenue = $row['e_Venue'];
        $hostID = $row['s_ID'];
        $department = getDept($dbc,$row['d_ID']);
        
        if($eventVenue == "Bethel Activity Hall" || $eventVenue == "Samuel Akande" || $eventVenue == "Royal Activity Hall" || $eventVenue == "Crystal Activity Hall"){
            $letterHead = "To The Hall Admin of ".$eventVenue;
        }
        else if($eventVenue == "Stadium"){
            $letterHead = "To the Stadium Director";
        }
        else{
            $letterHead = "To Who It May Concern";
        }
    }
}

$query = "SELECT * FROM t_students WHERE s_ID = $hostID";
$run2 = mysqli_query($dbc, $query);

if(!$run2){
    echo "Error Finding Host".mysqli_error($dbc);
}else{
    while($row2 = mysqli_fetch_array($run2)){
        $eventHost = $row2['s_Firstname']." ".$row2['s_Lastname'];
    }
}

?>