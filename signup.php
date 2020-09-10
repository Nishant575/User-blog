<?php

  if(isset($_POST['name']))
  {

    include_once "includes/db.php";

    //variables
    $name =$_POST['name'];
    $email =$_POST['email'];
    $password =$_POST['password'];

    if(empty($name) || empty($email) || empty($password))
    {
      $error = "error";

    }
    else {
      $sql="INSERT INTO `signup` ( `name`, `email`, `password`) VALUES ( '$name', '$email', '$password');";

      if($con->query($sql) == true)
        {
          header("Location:login.php");
          die();
        }
      else
      {
        echo "ERROR: $sql <br> $con->error";
      }

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
    <title>Sign up</title>
  </head>

  <body>
    <div class="row justify-content-center form">
      <div class="col-4">
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-5">
                <h2 class = "card-title">Sign up</h2>
              </div>
            </div>
            <div class="row form2">
              <div class="col-12">
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="name">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Email ID</label>
                    <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="" name="email">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="" name="password">
                  </div>
                  <?php
                    if(isset($error)){
                      ?>
                      <p class="inv">Please fill all details!</p>
                    <?php }?>
                  <br>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sign up</button>
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
