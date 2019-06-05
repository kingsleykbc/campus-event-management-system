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
    <title>Student Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form class="login-box" action="login.php" method="post">
        <h4>Enter Matric Number </h4>
        <input type="text" name="matric" id="matric" maxlength="7" placeholder="XX/XXXX">
        <?php echo $errors ?> 
        <input type="submit" name="submit" value="Proceed">  
    </form>    
</body>
</html>