<?php

  include_once "includes/db.php";

  if($user !== null) {
    header("Location:index.php");
  }

  if(isset($_POST['email'])) {
     

    //variables
  
    $email =$_POST['email'];
    $password =$_POST['password'];

    $sql="SELECT * FROM users WHERE email='$email';";
    
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      $user = $result->fetch_assoc();

      //Password checking
      if($password == $user['password'])
      {
        $_SESSION['uid'] = $user['id'];
        header("Location:index.php");
      
      }
      else
      {
         $errorMessage = "Invalid password";
      }
        
            
    } else {
      $errorMessage = "Invalid password";
    }

    
  }


?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="form">
      
       <form  method="POST">
       
       

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
       
       
            <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter password">
            </div>

            <?php
                if(isset($errorMessage)){
                  echo $errorMessage;
                }
            ?>

            <button class="btn btn-primary">SUBMIT</button>
       
       
       </form>
      
      </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>