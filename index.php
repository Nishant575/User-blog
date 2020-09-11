<?php
  include_once "includes/db.php";
  $user = null;
  if(isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $sql="SELECT * FROM signup WHERE sno=$uid;";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {

      $user = $result->fetch_assoc();

    }
  }

  $messages = [];
  $sql = "SELECT * FROM Messages WHERE id=$uid;";

  $result = $con->query($sql);

  if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

      array_push($messages , $row);
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
    <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">HOME</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deleteuser.php">Delete account</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron head text-light text-center">

                  <div class="row">
                    <div class="col-12">
                  <?php
                    if($user === null) {
                      header("Location:login.php");
                    } else {
                      $name = $user['name'];
                      ?>
                    <h2>Welcome  <?= $user['name']?>!</h2>
                    <?php
                   }
                 ?>
               </div>

             </div>
            </div>
            </div>
        </div>
        <div class="row message-box">
          <div class="col-lg-9">
            <form class="" action="post.php" method="post">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="submit">Post</button>
                </div>
                <textarea class="form-control" name="msg" aria-label="With textarea" placeholder="Type something....."></textarea>
              </div>
              </form>
              </div>
          </div>
        <?php

         foreach ($messages as $message) {
           ?>
          <div class="row card-box">
              <div class="col-lg-9">
                  <div class="card">
                      <div class="card-header h-40" style="padding-bottom: 0rem; background-color: rgb(179, 242, 217);">
                        <p><?=$message['date']?>   <?=$message['time']?></p>
                      </div>
                      <div class="card-body">
                        <p><?=$message['post']?></p>

                      </div>
                      <div class="card-footer" style="padding-top: 0.2rem; padding-bottom: 0.2rem; background-color: rgb(179, 242, 217);">
                        <a class="card-link text-danger" href="deletepost.php?id=<?php echo $message['sno']?>">Delete</a>
                      </div>
                  </div>
              </div>
          </div>
        <?php } ?>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
