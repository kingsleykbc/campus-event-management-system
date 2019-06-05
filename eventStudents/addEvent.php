<?php
    require_once('./php/handlePage.php'); 
    //Event Data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $d_ID = $studentDeptID;

    //if student is not in the database, Add the student
    if(!$disabled){
        require_once('./php/addStudent.php');
    }
    
    //Add the event
    $queryEvents = "INSERT INTO t_events 
                        (`e_ID`, `e_Title`, `e_Description`, `e_Date`, `e_Venue`, `e_HodApproved`, `e_AdminApproved`, `s_ID`, `d_ID`) 
                    VALUES (NULL, '$title', '$description', '$date', '$venue', '2', '2', '$s_ID', '$d_ID');";
    
    $addEvent = mysqli_query($dbc, $queryEvents);

    if($addEvent){
        require('./php/success.php');
    }else{
        echo "error adding event ".mysqli_error($dbc);
    }

?>