<?php
    require('./php/handleView.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="css/viewLetter.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            STUDENT SYSTEM
        </div>
        <div class="menu">
            <ul>
                <li><a href="postEvent.php" class="filter">Post Event</a></li>
                <li><a href="getEvents.php" class="filter active">My Events</a></li>
            </ul>
        </div>
        <div class="buttons">
            <a href="login.php" class="button">Logut</a>
        </div>
    </header>
    <div id="section" style="padding-bottom:50px;">
        <div class="letter">
            <div class="body">
                <div class="letterHead">
                    <h4>BABCOCK UNIVERSITY</h4>
                    <p>ileshan-Remo Ogun State</p>
                </div>
                <h2><?php echo $letterHead ?></h2>
                <h3>Letter of Acceptance</h3>
                <p>
                    This is a letter verifying that <b><?php echo $eventHost; ?></b> has permission to host the event <b><?php echo $eventTitle; ?></b> at 
                    <b><?php echo $eventVenue?></b> on  <b><?php echo $eventDate?></b>.
                    This event is officially approved by the Vice Chancellor of the School, as well as the Head of Department of 
                    <b><?php echo $department?>.</b>
                    <br>
                    <br>
                    <br>
                    Any Alteration to this document renders it null and void. Defaulters will be sanctioned accordingly.
                </p>
            </div>
            <div class="signature">
                <div class="s">
                    <img src="images/sign.png" alt="" srcset="">
                    <div>------------------------------------------------------</div>
                    <div>H.O.D Computer Science</div>
                </div>
                <div class="s">
                    <img src="images/sign2.png" alt="" srcset="">
                    <div>------------------------------------------------------</div>
                    <div>V.C. Babcock University</div>
                </div>
            </div>
        </div>
    </div>
    <div id="print" onClick="print()">
        <svg fill="currentColor" width="40" height="40" viewBox="0 0 40 40" style="vertical-align:middle;display:inline-block;" size="50" preserveAspectRatio="xMidYMid meet"><g><path d="m30 5v6.640000000000001h-20v-6.640000000000001h20z m1.6400000000000006 15q0.7033333333333331 0 1.211666666666666-0.466666666666665t0.509999999999998-1.173333333333332-0.5083333333333329-1.211666666666666-1.2100000000000009-0.5100000000000016-1.1716666666666669 0.5083333333333329-0.466666666666665 1.2100000000000009 0.466666666666665 1.1716666666666669 1.173333333333332 0.466666666666665z m-5 11.64v-8.283333333333331h-13.283333333333333v8.283333333333331h13.283333333333333z m5-18.28q2.0333333333333314 0 3.5166666666666657 1.4833333333333343t1.4833333333333343 3.5166666666666657v10h-6.640000000000001v6.640000000000001h-20v-6.640000000000001h-6.64v-10q0-2.0333333333333314 1.4833333333333334-3.5166666666666657t3.5166666666666657-1.4833333333333343h23.283333333333335z"></path></g></svg>
    </div>
</body>
</html>