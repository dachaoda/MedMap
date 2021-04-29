<?php
  $db = mysqli_connect('localhost', 'root', '', 'gui');
  if(!$db){
   echo 'Could not connect to Database: ' . mysqli_connect_error();
  }
?>
