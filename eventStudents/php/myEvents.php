<?php
    //Get all the student Events
    $queryEvents = "SELECT * FROM t_events where s_ID = $s_ID";
    $eventsResults = @mysqli_query($dbc, $queryEvents);

    if($eventsResults){
        while($row = mysqli_fetch_array($eventsResults)){

            //Set the default approved toggle
            if($row['e_HodApproved'] == 1 && $row['e_AdminApproved'] == 1){
                $status = 
                "<a href='viewLetter.php?e_ID=".$row['e_ID']."'>
                    View Letter
                </a>";
            }else{
                $status = 
                "<div>
                    <svg fill='currentColor' preserveAspectRatio='xMidYMid meet' height='1em' width='1em' viewBox='0 0 40 40' style='vertical-align: middle;'><g><path d='m25.2 13.4v-3.4c0-2.8-2.4-5.2-5.2-5.2s-5.2 2.4-5.2 5.2v3.4h10.4z m-5.2 15c1.8 0 3.4-1.6 3.4-3.4s-1.6-3.4-3.4-3.4-3.4 1.6-3.4 3.4 1.6 3.4 3.4 3.4z m10-15c1.8 0 3.4 1.4 3.4 3.2v16.8c0 1.8-1.6 3.2-3.4 3.2h-20c-1.8 0-3.4-1.4-3.4-3.2v-16.8c0-1.8 1.6-3.2 3.4-3.2h1.6v-3.4c0-4.6 3.8-8.4 8.4-8.4s8.4 3.8 8.4 8.4v3.4h1.6z'></path></g></svg>
                </div>
                <div>View Letter</div>";
            }
            $myEvents .= "
            <article>           
                <h2>
                    ".$row['e_Title']."                    
                </h2>                
                <p class='text'>
                    ".$row['e_Description']."
                </p>
                <div class='approvals'>
                    <div class='".getStatus($row['e_AdminApproved'])."'>
                        Admin ".getStatus($row['e_AdminApproved'])."
                    </div>
                    <div class='".getStatus($row['e_HodApproved'])."'>
                        HOD ".getStatus($row['e_HodApproved'])."
                    </div>
                </div>
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
                       $status
                    </div>
                </section>
            </article>";
        }
    }else{
        echo "Error getting Events ".mysqli_error($dbc);
    }

?>