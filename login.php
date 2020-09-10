<?php

  include_once "includes/db.php";
  $user = null;
  if($user !== null) {
    header("Location:index.php");
  }

  if(isset($_POST['email'])) {


    //variables

    $email =$_POST['email'];
    $password =$_POST['password'];

    $sql="SELECT * FROM signup WHERE email='$email';";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      $user = $result->fetch_assoc();

      //Password checking
      if($password == $user['password'])
      {
        $_SESSION['uid'] = $user['sno'];
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>

  <body>
    <div class="row justify-content-center form">
      <div class="col-4">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-5">
                <h2 class = "card-title">Login</h2>
              </div>
            </div>
            <div class="row form2">
              <div class="col-12">
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Email ID</label>
                    <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="" name="email">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="" name="password">
                  </div>
                  <?php
                      if(isset($errorMessage)){
                        ?><p class="inv">Invalid password or email!</p>
                        <?php
                      }
                  ?>
                  <br>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Log in</button>
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="signup.php">Create an account?</a>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
