<?php
$db_host="localhost";
$db_user="root";
$db_password="950227";
$db_name="reservation2";
$con = new mysqli($db_host,$db_user,$db_password,$db_name);
if($con->connect_errno){die('connection Error:'.$con->connect_error);}
?>
