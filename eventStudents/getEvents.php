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
    <div id="section">
        <?php echo $myEvents ?>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/handlePage.js"></script>
</body>
</html>