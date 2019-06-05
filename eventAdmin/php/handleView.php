<?php
    require_once('connect.php');
    require_once('getEntities.php');

    $eventID = $_GET['Id'];
    $otherEvents = "";

    //Get the event that the user clicked on
    $queryEvents = "SELECT * FROM t_events WHERE e_ID =".$eventID;
    $eventsResult = @mysqli_query($dbc,$queryEvents);

    if($eventsResult){
        while($row = mysqli_fetch_array($eventsResult)){
            $eventID = $row['e_ID'];
            $eventTitle = $row['e_Title'];
            $d_ID = $row['d_ID'];
            $eventDepartment = getUserById($row['d_ID'], $dbc, "t_departments");
            $eventHost = getUserById($row['s_ID'], $dbc, "t_students");
            $eventDescription = $row['e_Description'];
            $eventDate = $row['e_Date'];
            $eventVenue = $row['e_Venue'];
            $eventHodStatus = getStatus($row['e_HodApproved']);
            $eventAdminStatus = getStatus($row['e_AdminApproved']);
        }
    }else{
        echo mysqli_error($dbc);
    }

    //get Other Events
    $query = "SELECT * FROM t_events WHERE d_ID = $d_ID";

    $run = @mysqli_query($dbc, $query);

    if(!$run){
        $otherEvents = "Cannot Get Other Events Now : ".mysqli_error($dbc);
    }else{
        if (mysqli_num_rows($run) == 0){
            $otherEvents = "<div class='noOther'> No Other Events in $eventDepartment";
        }else{
            while($row = mysqli_fetch_array($run)){
                $otherEvents .= "
                    <a href='viewEvent.php?Id=".$row['e_ID']."'class='eventItem'>
                        <div class='fItem'>
                            <svg fill='currentColor' width='24' height='24' viewBox='0 0 40 40' style='vertical-align:middle;display:inline-block;' size='50' preserveAspectRatio='xMidYMid meet'><g><path d='m23.36 23.36v3.2833333333333314h-11.716666666666667v-3.2833333333333314h11.716666666666667z m8.280000000000001 8.280000000000001v-18.283333333333335h-23.28333333333333v18.283333333333335h23.28333333333333z m0-26.64q1.3283333333333331 0 2.3433333333333337 1.0166666666666666t1.0166666666666657 2.3400000000000007v23.28333333333333q0 1.326666666666668-1.0166666666666657 2.3416666666666686t-2.3433333333333337 1.0166666666666657h-23.28333333333333q-1.405000000000002 0-2.3833333333333346-1.0166666666666657t-0.9733333333333345-2.341666666666665v-23.28333333333334q0-1.3266666666666653 0.9749999999999996-2.341666666666665t2.383333333333333-1.0150000000000006h1.6416666666666675v-3.36h3.3583333333333343v3.36h13.283333333333331v-3.36h3.3583333333333343v3.36h1.6400000000000006z m-3.280000000000001 11.64v3.3599999999999994h-16.71666666666667v-3.3599999999999994h16.71666666666667z'></path></g></svg>
                            <span>".$row['e_Title']."</span>
                        </div>
                        <div>
                            <span>".$row['e_Date']."</span>
                        </div>

                    </a>
                ";
            }
        }
    }
?>