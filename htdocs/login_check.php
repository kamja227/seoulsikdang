<?php
session_start();
include("connect.php");
$user_id=$_POST['user_id'];
$user_password=$_POST['user_password'];
$query="select * from customer_table where user_id='$user_id' and user_password='$user_password'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result);

if($user_id==$row['user_id']&&$user_password==$row['user_password']){
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['user_name']=$row['user_name'];
	$_SESSION['user_no']=$row['user_no'];
	
	echo "<script>location.href='login.php';</script>";
}else{
	echo "<script>window.alert('아이디 또는 비밀번호를 확인해주세요.');</script>";
	echo "<script>location.href='login.php';</script>";
}
?>

</body>
</html>
