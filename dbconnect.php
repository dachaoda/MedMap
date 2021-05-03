<?php
  $db = mysqli_connect('localhost', 'root', '', 'guitest');
  if(!$db){
   echo 'Could not connect to Database: ' . mysqli_connect_error();
  }
?>
