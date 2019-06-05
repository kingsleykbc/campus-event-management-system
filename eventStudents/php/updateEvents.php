<?php
require_once('connect.php');

$e_ID = $_POST['e_ID'];
$resID = $_POST['resID'];

$query="UPDATE t_events SET e_HodApproved = $resID WHERE e_ID = $e_ID";

$updateEvent = @mysqli_query($dbc,$query);

if ($updateEvent){
    $query = "SELECT e_HodApproved FROM t_events where e_ID = $e_ID";
    $eventResults = @mysqli_query($dbc,$query);

    if($eventResults){
        while($row = mysqli_fetch_array($eventResults)){
            if($row['e_HodApproved'] == 1){
                echo "Approved";
            }else{
                echo "Declined";
            }
        }
    }
}

?>