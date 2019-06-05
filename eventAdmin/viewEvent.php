<?php 
   require_once('./php/handleView.php');   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page.css">
    <title>Admin Page</title>
</head>
<body>
    <span id="e_ID" style="display:none"><?php echo $eventID ?></span>
    <header>
        <div class="logo">
            ADMIN SYSTEM
        </div>
        <div class="menu">
        </div>
        <div class="buttons">
            <a href="#" class="button"><?php echo $activeUser?></a>
            <a href="#" class="button">Logout</a>
        </div>
    </header> 
    <div class="page">
        <aside class="aSide">
            <div class="prev">Other Events from <?php echo $eventDepartment?></div>
            <?php echo $otherEvents ?>
        </aside>
        <div id="section2">
            <div class="view-top">
                <h2><?php echo $eventTitle?></h2>
                <div class="view-options">
                    <div id="accept" >Accept</div>
                    <div id="decline">Decline</div>
                </div>
            </div>
            <ul>
                <li>
                    <span>Host</span>
                    <span><?php echo $eventHost?></span>
                </li>
                <li>
                    <span>Department</span>
                    <span><?php echo $eventDepartment?></span>
                </li>
                <li>
                    <span>Date and Time</span>
                    <span><?php echo $eventDate?></span>
                </li>
                <li>
                    <span>Venue</span>
                    <span><?php echo $eventVenue?></span>
                </li>
                <li style="padding:7px 15px; background:none;">
                    <span>Approval by Department</span>
                    <span class="<?php echo $eventHodStatus ?>"><?php echo $eventHodStatus?></span>
                </li>
                <li style="padding:17px 15px; background:none;">
                    <span>Approval by Admin</span>
                    <span id="adminApproval">
                        <span class="<?php echo $eventAdminStatus?>"><?php echo $eventAdminStatus?></span>
                    </span>
                </li>
            </ul>
            <div class="ruler">Event Description</div>
            <p class="event-description">
                <?php echo $eventDescription?>
            </p>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/viewEvent.js"></script>
</body>
</html>