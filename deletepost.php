<?php
include_once "includes/db.php";

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "DELETE FROM Messages WHERE sno='$id'";
  if($con->query($sql))
  {
    header('Location:index.php');
  }
}

 ?>
