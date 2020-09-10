<?php
session_start();

  $server="localhost";
  $username="root";
  $password="";
  $dbname="users";


    $con=mysqli_connect($server,$username,$password,$dbname);

    if(!$con)
    {
        echo ("error".mysqli_connect_error());
    }


    
