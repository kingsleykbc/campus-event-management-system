<?php
    $studentName = trim($_POST['studentName']);
    $studentName = explode(" ",$studentName);

    //New User's Data
    $firstname = $studentName[0];
    $lastname = (sizeOf($studentName) > 1) ? $studentName[1] : '';
    $matric = $studentMatric;
    $d_ID = $_POST['department'];

    //Add
    $queryStudents = "INSERT INTO t_students(`s_ID`, `s_Firstname`, `s_Lastname`, `s_Matric`, `d_ID`) 
                                        VALUES (NULL, '$firstname', '$lastname', '$matric', '$d_ID')";
    
    $addStudents = mysqli_query($dbc,$queryStudents);

    if($addStudents){
      
        // Get the Student ID
        $studentQuery = "SELECT s_ID, d_ID FROM t_Students WHERE s_Matric = '$matric'";
        $studentsResult = @mysqli_query($dbc,$studentQuery);

        if($studentsResult){
            while($row = mysqli_fetch_array($studentsResult)){
                $s_ID = $row['s_ID'];
                $d_ID = $row['d_ID'];
            }
        }else{
            echo "Error finding the students".mysqli_error($dbc);
        }
    }else{
        echo "student not added".mysqli_error($dbc);
    } 
?>