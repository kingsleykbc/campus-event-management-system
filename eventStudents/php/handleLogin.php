<?php  
    require_once('connect.php');

    $_SESSION['matric'] = ""; //Initialize Session    
    $errors = ""; //Initialize Error Message

    //if Matric Number is Set
    if (isset($_POST['matric']) && !empty(trim($_POST['matric'])))
    {
      //Get matric number from Input field
      $matric = trim($_POST['matric']); 
      $_SESSION['matric'] = $matric; //Create Session
        
      header("Location: postEvent.php"); //redirect to page
    }else{
      $errors =
      "<div id='errors'>
          Please Enter your matric Number
      </div>";
    }
?>