<?php
$con = mysqli_connect("localhost", "root", "", "idojaras");

// Check connection
if (mysqli_connect_errno()) {
    echo "Sikertelen kapcsolódás: " . mysqli_connect_error();
}
?>