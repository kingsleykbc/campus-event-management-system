<?php
    require_once('connect.php');
    require_once('getEntities.php');

    //Check for Filtering
    $queryEvents="";

    if($_POST['e_HodApproved'] == 0){
        $queryEvents = "SELECT * FROM t_events WHERE d_ID='".$_POST["d_ID"]."'";
    }else{
        $queryEvents = "SELECT * FROM t_events WHERE d_ID='".$_POST["d_ID"]."' AND e_HodApproved='".$_POST['e_HodApproved']."'";
    }
    
    //Search the DB for the department searched 
    $eventsResult = @mysqli_query($dbc,$queryEvents);

    if($eventsResult){

        //Return all the events under the depatment
        while($row = mysqli_fetch_array($eventsResult)){

            //Get the co-ordinator
            $queryStudent = "SELECT * FROM t_students WHERE s_ID='".$row["s_ID"]."'";
            $studentResult = @mysqli_query($dbc,$queryStudent);

            //If student and department is found, proceed to return the HTML of the page
            if($studentResult){
                while ($row2 = mysqli_fetch_array($studentResult)){
                    $student = $row2['s_Firstname']." ".$row2['s_Lastname'];

                    echo "<a href='viewEvent.php?Id=".$row['e_ID']."'class='event'>
                        <div class='top'>
                            <h3>".$row['e_Title']."</h3>
                            <p>".$student."</p>
                        </div>
                        <div class='description'>
                            ".$row['e_Description']."
                        </div>
                        <div class='stats'>
                            <div>".$row['e_Date']."</div>
                            <div>".$row['e_Venue']."</div>
                        </div>
                        <div class='".getStatus($row['e_HodApproved'])."'>
                            ".getStatus($row['e_HodApproved'])."
                        </div>
                    </a>";
                }
            }else{
                echo mysqli_error($dbc);
            }
        }
    }else{
        echo mysqli_error($dbc);
    }

?>