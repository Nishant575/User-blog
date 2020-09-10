<?php
 include_once "includes/db.php";
 $uid = $_SESSION['uid'];
  $message = $_POST['msg'];
  $date = date("Y-m-d");
  $time = date("g:i a");
  if(empty($message))
  {
    header("Location:index.php");
    die();
  }
  else{

    $sql2 = "INSERT INTO `Messages` ( `post`, `id` , `date` , `time`) VALUES ( '$message' , '$uid' , '$date' , '$time');";
    if($con->query($sql2) == true){
      header("Location:index.php");
    }
    else{
      echo "ERROR: $sql2 <br> $con->error";
    }
  }

 ?>
