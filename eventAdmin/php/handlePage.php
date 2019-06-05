<?php
    require_once('connect.php');
    require_once('getEntities.php');

    $departments = "";
    $firstActive = "";

    //Get all departments
    $queryDepartment = "SELECT * FROM t_departments";
    $departmentResult = @mysqli_query($dbc,$queryDepartment);
    
    //Check The Aside section of page.php to view the results List
    if($departmentResult){
        while($row = mysqli_fetch_array($departmentResult)){
            if ($row['d_ID']  == 1) $firstActive="deptActive"; else $firstActive=""; 

            //Get all the events under each department
            $queryEvents = "SELECT * FROM t_events WHERE d_ID=".$row['d_ID'];
            $eventResult = @mysqli_query($dbc, $queryEvents);

            //Set $departments to all the departments in the DB
            $departments .='<div class="dept '.$firstActive.'"><span>'.$row['d_ID'].'</span><span>'.$row['d_Name'].'</span><span>'.mysqli_num_rows($eventResult).'</span></div>';
        }
    }
?>