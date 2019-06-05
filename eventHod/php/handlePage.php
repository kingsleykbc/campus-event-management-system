<?php
    require_once('connect.php');
    require_once('getEntities.php');

    $events = "";

    $queryEvents = "SELECT * FROM t_events where d_ID = $deptID";
    $eventsResults = @mysqli_query($dbc, $queryEvents);

    if($eventsResults){
        while($row = mysqli_fetch_array($eventsResults)){

            //Set the default approved toggle
            $accept = ($row['e_HodApproved'] == 1) ? "chosen" : "";
            $rejected = ($row['e_HodApproved'] == 3) ? "chosen" : "";
            
            $events .= "
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
                        <div class='accept' id='acc".$row['e_ID']."' onClick='setResponse(this, 1,\"rej".$row['e_ID']."\")'>Accept</div>
                        <div class='reject' id='rej".$row['e_ID']."' onClick='setResponse(this, 3,\"acc".$row['e_ID']."\")'>Decline</div>
                    </div>
                </section>
            </article>";
        }
    }else{
        echo "Error getting Events".mysqli_error($dbc);
    }
?>