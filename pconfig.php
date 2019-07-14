
<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "salary_dbms";

$conn = mysqli_connect($server,$user,$pass,$db);

if(mysqli_connect_errno()){
    echo 'Failed to connect to the server'.mysqli_connect_errno();
}

?>
