<?php
    session_start();
    if (!$_SESSION['username2']) header('location:login.php');

    $activeUser = "";
    $deptID = 0;

    //Get the User that is Logged In
    $queryUser = "SELECT * FROM t_hods WHERE h_Username = '".$_SESSION['username2']."'";
    $userResult = @mysqli_query($dbc,$queryUser);

    if($userResult){
        while($row = mysqli_fetch_array($userResult)){
            $activeUser = $row['h_Firstname']." ".$row['h_Lastname'];
            $deptID = $row['d_ID'];
        }
    }

    //Functions
    //Get Users by ID
    function getUserById($userId,$db,$tName){
        $user = '';

        if($tName == 't_students'){
            $id = 's_ID';
        }else if ($tName == 't_departments'){
            $id = 'd_ID';
        }else {
            $id = 'h_ID';
        }
        $userQuery = "SELECT * FROM $tName WHERE $id = $userId";
        $userResult = @mysqli_query($db,$userQuery);

        if($userResult){
            while($row = mysqli_fetch_array($userResult)){
                if($tName == 't_students'){
                    $user = $row['s_Lastname']." ".$row['s_Firstname'];
                }else if ($tName == 't_departments'){
                    $user = $row['d_Name'];
                }else{
                    $user = $row['h_Lastname']." ".$row['h_Firstname']; 
                }
            }
            return $user;
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