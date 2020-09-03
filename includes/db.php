<?php
session_start();
  
  $server="localhost";
  $username="root";
  $password="";
  $dbname="login";
  
  
    $con=mysqli_connect($server,$username,$password,$dbname);
  
    if(!$con)
    {
        echo ("error".mysqli_connect_error());
    }


    $user = null;
    if(isset($_SESSION['uid'])) {
      $uid = $_SESSION['uid'];
      $sql="SELECT * FROM users WHERE id=$uid;";
        
      $result = $con->query($sql);
    
      if ($result->num_rows > 0) {
    
        $user = $result->fetch_assoc();
              
      }
    }