<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<title></title>
</head>
<body>
<?php
session_start();
if($_SESSION['user_id']==null){
?>
<section>
  
<form name="form_login" action="login_check.php" method="post" id='account'>
<div class="w3-third w3-margin-bottom">
<div class="w3-container w3-white">
<h3> Login </h3>
  <label>아이디</label>
  <input type="text" name="user_id" class="w3-input w3-border">
  <label>비밀번호</label>
  <input type="password" name="user_password" class="w3-input w3-border">
    <div class="w3-container w3-white">
    <a href="segment.php"  class="w3-button w3-margin-top" >회원가입</a>
  <input type="submit" class="w3-button w3-red w3-margin-top" value="로그인">
  </div>
  </div>
  </div>
      </form>
</section>

<?php
}else{
  echo "<script>parent.location.reload(true);</script>";
  echo "<script>location.href='rest_list.php';</script>";
}  


?>
  
</body>
</html>
