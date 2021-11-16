<?php
$con = mysqli_connect("localhost","root","","idojaras");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Hiba az adatbázishoz való csatlakozáskor: " . mysqli_connect_error();
  }

?>

