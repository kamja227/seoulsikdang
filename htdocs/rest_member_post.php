<?php

  $rest_id = $_POST["rest_id"];
  $rest_password = $_POST["rest_password"];
  $rest_user_name = $_POST["rest_user_name"];
  $rest_user_gender= $_POST["rest_user_gender"];
  $rest_user_birthday = $_POST["rest_user_birthday"];
  $rest_user_tel = $_POST["rest_user_tel"];
  $rest_name = $_POST["rest_name"];
  $rest_tel = $_POST["rest_tel"];
  $rest_address = $_POST["rest_address"];
  $rest_opentime=$_POST["rest_opentime"];
  $rest_mainmenu=$_POST["rest_mainmenu"];
 // $rest_max=$_POST["rest_max"];
  $rest_message=$_POST["rest_message"];
//  $rest_allowance = $_POST["rest_allowance"];
  $rest_bronze_max = $_POST["rest_bronze_max"];
  $rest_silver_max = $_POST["rest_silver_max"];
  $rest_gold_max = $_POST["rest_gold_max"];
  $theme_location= $_POST["theme_location"];
  $theme_mood = $_POST["theme_mood"];
  $theme_food = $_POST["theme_food"];
  $cur_date=getdate();


#--------날짜 형식에 맞게 수정
  $rest_user_joindate = $cur_date[year];
if($cur_date[mon] < 10)
  $rest_user_joindate.= "-0" .$cur_date[mon];
else
  $rest_user_joindate.="-" .$cur_date[mon];

if($cur_date[mday]<10)
  $rest_user_joindate.="-0" .$cur_date[mday];
else
  $rest_user_joindate.="-" .$cur_date[mday];

 $connect = mysql_connect("localhost","root","950227");
 mysql_select_db("reservation2");


 $query = "insert into restaurant_table(rest_id,rest_password,rest_user_name,rest_user_gender,rest_user_birthday,rest_user_tel,rest_name,rest_tel,rest_address,rest_opentime,rest_mainmenu,rest_bronze_max, rest_silver_max, rest_gold_max,rest_message,rest_user_joindate)
    values('$rest_id','$rest_password','$rest_user_name','$rest_user_gender','$rest_user_birthday','$rest_user_tel','$rest_name','$rest_tel','$rest_address','$rest_opentime','$rest_mainmenu', '$rest_bronze_max', '$rest_silver_max', '$rest_gold_max', '$rest_message','$rest_user_joindate')
    ";

 $query1 = "insert into theme_table(theme_location, theme_mood, theme_food)
    values('$theme_location','$theme_mood','$theme_food')";

mysql_query($query, $connect);
 $result=mysql_query($query1,$connect);

 mysql_close($connect);

if ($result){
    echo "<script>window.alert('회원가입이 완료되었습니다. 로그인 후에 이용해 주세요.');</script>";
    echo "<script>location.href='rest_login.php';</script>";
  }

?>
