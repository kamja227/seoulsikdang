<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
<?php
session_start();
include("connect.php");
$rest_id=$_POST['rest_id'];
$rest_password=$_POST['rest_password'];
$query="select * from restaurant_table where rest_id='$rest_id' and rest_password='$rest_password'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
//$hash = password_hash($password, PASSWORD_DEFAULT); 

if($rest_id==$row['rest_id']&&$rest_password==$row['rest_password']){
   $_SESSION['rest_id']=$row['rest_id'];
   $_SESSION['rest_name']=$row['rest_name'];
   $_SESSION['rest_no'] = $row['rest_no'];
   echo "<script>location.href='rest_login.php';</script>";
}else{
   echo "<script>window.alert('아이디 또는 비밀번호를 확인해주세요.');</script>";
   echo "<script>location.href='rest_login.php';</script>";
}


?>

</body>
</html>