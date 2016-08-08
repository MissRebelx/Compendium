<?php
$dbhostname = "localhost"; //server name
$dbusername = "rebel";  //username
$dbpassword = "whatever";       //password
$dbdatabase = "compendium";  //database name
$connection = mysqli_connect($dbhostname,$dbusername,$dbpassword,$dbdatabase);
if (!$connection){
    die("Database Connection Failed" . mysqli_connect_errno() . mysqli_connect_error());
}
?>