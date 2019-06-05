<?php
    require('connect.php');
    require('getEntities.php');

    $queryUpdate = "UPDATE t_events SET e_AdminApproved =".$_POST['num']." WHERE e_ID= '".$_POST['e_ID']."'";
    
    $updateEvent = @mysqli_query($dbc,$queryUpdate);

    if($updateEvent){
        echo "<span class=".getStatus($_POST['num']).">".getStatus($_POST['num'])."</span>";
    }else{
        echo "Error ".mysqli_error($dbc);
    }
?>