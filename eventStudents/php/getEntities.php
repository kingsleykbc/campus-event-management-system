<?php
    session_start();
    if (!$_SESSION['matric']) header('location: login.php');
    $s_ID="";
    $studentName="";
    $studentDept="";
    $studentDeptID=0;
    $studentMatric = $_SESSION['matric'];
    $disabled=false;
    $deptID = 0;

    //Get the User that is Logged In
    $queryUser = "SELECT * FROM t_students WHERE s_Matric = '".$studentMatric."'";
    $userResult = @mysqli_query($dbc,$queryUser);

    if($userResult && mysqli_num_rows($userResult) > 0){
        while($row = mysqli_fetch_array($userResult)){
            $disabled = true;
            $s_ID = $row['s_ID'];
            $studentName = $row['s_Firstname']." ".$row['s_Lastname'];
            $studentDeptID= $row['d_ID'];
            $studentDept = getDept($dbc,$studentDeptID);
        }
    }
    
    $disableField = $disabled ? "disabled ='true'" : "";
    /*
        FUNCTIONS
    */
    //Get department name by ID
    function getDept($db, $id){
        $queryDept = "SELECT d_Name FROM t_departments WHERE d_ID = $id";
        $deptResult = @mysqli_query($db, $queryDept);

        if($deptResult){
            while($row = mysqli_fetch_array($deptResult)){
                return $row['d_Name'];
            }
        }else{
            return "Error retreiving Department name".mysqli_error($db);
        }
    }

    //Get event Status by value
    function getStatus($target){
        if($target == 1){
            return "approved";
        }else if($target == 2){
            return "pending";
        }else{
            return "declined";
        }
    }
?>