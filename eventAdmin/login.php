<?php
    session_start();
    require_once('./php/handleLogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <?php echo $errors ?>
    <div class="backdrop"></div>
    <form class="login-box" action="login.php" method="post">
        <h4>Admin Username</h4>
        <input type="text" name="username" id="username">
        <h4>Admin Password</h4>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Login">    
    </form>

    
</body>
</html>