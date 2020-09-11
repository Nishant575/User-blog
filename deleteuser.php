<?php
include_once "includes/db.php";

  $id = $_SESSION['uid'];
  $sql1 = "DELETE FROM signup WHERE sno='$id'";
  $sql2 = "DELETE FROM Messages WHERE id='$id'";
  if($con->query($sql1) && $con->query($sql2))
  {
    header('Location:logout.php');
  }
 ?>
