<?php
    
    require_once('connect.php');
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $res = "";

    $queryEvents = "SELECT e_Title FROM t_events WHERE e_Date = '$date' AND e_Venue = '$venue'";
    $eventsResult = mysqli_query($dbc, $queryEvents);

    if($eventsResult){
        //If an event that has the same date and venue exists, send a response else send nothing
        if(mysqli_num_rows($eventsResult) > 0){
            while($row = mysqli_fetch_array($eventsResult)){
                $res = "<span> Sorry, <b>".$row['e_Title']."</b> is holding at ".$venue." on ".$date."</span>";
            }
        }else{
            $res = "";
        }
    }else{
        $res = "<span> Error checking database ".mysqli_error($dbc)."</span>";
    }

    echo $res;
?>