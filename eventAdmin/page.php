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
    <title>Admin Page</title>
</head>
<body>
    <header>
        <div class="logo">
            ADMIN SYSTEM
        </div>
        <div class="menu">
            <ul>
                <li><span id="0" class="filter active">All Events</span></li>
                <li><span id="1" class="filter">HOD Approved</span></li>
                <li><span id="2" class="filter">HOD Pending</span></li>
                <li><span id="3" class="filter">HOD Rejected</span></li>
            </ul>
        </div>
        <div class="buttons">
            <a href="#" class="button"><?php echo $activeUser?></a>
            <a href="login.php" class="button">Logut</a>
        </div>
    </header> 
    <div class="page">
        <aside>
            <?php
                echo $departments;
            ?>
        </aside>
        <div id="section">
            This
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/handlePage.js"></script>
</body>
</html>