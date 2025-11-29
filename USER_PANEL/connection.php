<?php

//MYSQLi object-oriented
$servername="localhost";
$username="root";
$password="";
$database="e_gift";

$con = new mysqli($servername,$username,$password,$database);

//check connection

if(mysqli_connect_error())
{
    die("Database connection failed:".mysqli_connect_error());
}
else
{
    //echo "Connection Done" . "<br>";
}
?>