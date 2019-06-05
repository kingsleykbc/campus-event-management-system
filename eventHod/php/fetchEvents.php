<?php
    require_once('connect.php');
    require_once('getEntities.php');

    //Check for Filtering
    $queryEvents="";

    if($_POST['e_AdminApproved'] == 0){
        $queryEvents = "SELECT * FROM t_events WHERE d_ID='".$deptID."'";
    }else{
        $queryEvents = "SELECT * FROM t_events WHERE d_ID='".$deptID."' AND e_AdminApproved='".$_POST['e_AdminApproved']."'";
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

                    //Set the default approved toggle
                    $accept = ($row['e_HodApproved'] == 1) ? "chosen" : "";
                    $rejected = ($row['e_HodApproved'] == 3) ? "chosen" : "";

                    //Display results
                    echo "
                    <article> 
                        <div class='status ".getStatus($row['e_AdminApproved'])."'></div>           
                        <h2>
                            ".$row['e_Title']."                    
                        </h2>                
                        <p class='text'>
                            ".$row['e_Description']."
                        </p>
                        <p class='host'>Co-ordinated by ".getUserById($row['s_ID'],$dbc,'t_students')."</p>
                        <section>
                            <div class='stats'>
                                <span>
                                    ".$row['e_Venue']."
                                </span>
                                <span>
                                    ".$row['e_Date']."
                                </span>
                            </div>
                            <div class='options'>
                                <div class='accept ".$accept."' id='acc".$row['e_ID']."' onClick='setResponse(this, 1,\"rej".$row['e_ID']."\")'>Accept</div>
                                <div class='reject ".$rejected."' id='rej".$row['e_ID']."' onClick='setResponse(this, 3,\"acc".$row['e_ID']."\")'>Decline</div>
                            </div>
                        </section>
                    </article>";
                }
            }else{
                echo mysqli_error($dbc);
            }
        }
    }else{
        echo mysqli_error($dbc);
    }

?>