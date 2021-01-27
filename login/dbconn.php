<?php
$severname="localhost";
$uname="root";
$password="";
$dname="dummy";

$conn= mysqli_connect($severname,$uname,$password,$dname);

if (!$conn) {
    echo "connection is failed";
}

?>