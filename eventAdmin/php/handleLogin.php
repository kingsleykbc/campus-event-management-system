<?php  
    require_once('connect.php');

    $_SESSION['username'] = ""; //Initialize Session    
    $errors = ""; //Initialize Error Message

  //if Username is Set
  if (isset($_POST['username'])) 
  {
      //Get Username from Input field
      $username = trim($_POST['username']); 
      $password = trim($_POST['password']);
      
      //Search the DB for User with $name and $pass
      $query = "SELECT * FROM t_admins WHERE a_Username='$username' AND a_Password='$password'";
      $valid = mysqli_query($dbc,$query);

      //If User exists
      if(mysqli_num_rows($valid) > 0 ){
          $_SESSION['username'] = $username; //Create Session
          header("Location: page.php"); //redirect to page
      }
      else{
          //Display Error Message
          $errors = 
          "<div id='errors'>
                Invalid Credentials
           </div>"; 
      }
  }
?>