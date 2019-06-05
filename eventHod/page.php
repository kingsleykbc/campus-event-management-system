<?php 
   require_once('./php/handlePage.php');   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page.css">
    <title>Events</title>
</head>
<body>
    <header>
        <div class="logo">
            H.O.D SYSTEM
        </div>
        <div class="menu">
            <ul>
                <li><span id="0" class="filter active">All Events</span></li>
                <li><span id="1" class="filter">Admin Approved</span></li>
                <li><span id="2" class="filter">Admin Pending</span></li>
                <li><span id="3" class="filter">Admin Rejected</span></li>
            </ul>
        </div>
        <div class="buttons">
            <a href="#" class="button"><?php echo $activeUser ?></a>
            <a href="login.php" class="button">Logut</a>
        </div>
    </header>
    <div id="section">
        <?php echo $events ?>
    </div>
    <div class="legend">
        <ul>
            <li>
                <div class="status leg declined"></div>
                <div>Declined<div>
            </li>
            <li>
                <div class="status leg pending"></div>
                <div>Pending<div>
            </li>
            <li>
                <div class="status leg approved"></div>
                <div>Accepted<div>
            </li>
        </ul>
    </div>
    <div id="response">dd</div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/handlePage.js"></script>
</body>
</html>