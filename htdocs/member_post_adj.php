<?php

  $user_id = $_POST["user_id"];
  $user_password = $_POST["user_password"];
  $user_name = $_POST["user_name"];
  $user_gender= $_POST["user_gender"];
  $user_birthday = $_POST["user_birthday"];
  $user_tel = $_POST["user_tel"];
  $user_address = $_POST["user_address"];
  $cur_date=getdate();

#--------날짜 형식에 맞게 수정
  $user_joindate = $cur_date[year];
if($cur_date[mon] < 10)
   $user_joindate.= "-0" .$cur_date[mon];
else
   $user_joindate.="-" .$cur_date[mon];

if($cur_date[mday]<10)
   $user_joindate.="-0" .$cur_date[mday];
else
   $user_joindate.="-" .$cur_date[mday];

 $connect = mysql_connect("localhost","root","950227");
 mysql_select_db("reservation2");

 
 $query = "insert into customer_table(user_id,user_password,user_name,user_gender,user_birthday,user_tel,user_address,user_joindate)
    values('$user_id','$user_password','$user_name','$user_gender','$user_birthday','$user_tel','$user_address','$user_joindate')";
 $result = mysql_query($query, $connect);
 mysql_close($connect);

 if ($result){
    echo "<script>window.alert('회원가입이 완료되었습니다. 로그인 후에 이용해 주세요.');</script>";
    echo "<script>location.href='login.php';</script>";
 }
 
?>

<script>


</script>