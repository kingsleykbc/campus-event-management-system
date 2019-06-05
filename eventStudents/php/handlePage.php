<?php
    require_once('connect.php');
    require_once('getEntities.php');

    //Initialize variables
    $departments = "";
    $myEvents="";

    if($disabled){
        require('myEvents.php');
        $departments = "<option> $studentDept </option>";
    }else{
        $departments .= '<option>--</option>';
        //Empty data
        $myEvents = "<div id='noData'> No events</div>";
        //get departments
        $queryDepartments = "SELECT * FROM t_departments";
        $departmentsResult = @mysqli_query($dbc, $queryDepartments);
        if($queryDepartments){
            while($row = mysqli_fetch_array($departmentsResult)){
                $departments .=
                "<option value='".$row['d_ID']."'>".$row['d_Name']."</option>";
            }
        }
    }

?>