<?php
  session_start();

  $resr_no = $_POST["resr_no"];
  $user_no = $_POST["resr_user_no"];

  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

  $resr_state = "예약완료";
  $sql = "UPDATE reservation_table SET resr_state= '$resr_state' WHERE resr_no = '$resr_no'";

  mysql_query($sql, $conn) or die(mysql_error());

  if(mysql_affected_rows($conn) == 0) {
      echo "예약 상태 변경에 실패하였습니다. ";
  }
  else {
   echo "예약이 완료 되었습니다. ";
  }

  $query = mysql_query("select * from reservation_table where resr_user_no='" .$user_no. "' && resr_state='예약완료'") or die(mysql_error());
  $finished_rows = mysql_num_rows($query);
  $query1 = mysql_query("select * from reservation_table where resr_user_no='" .$user_no. "' && resr_state='노쇼'") or die(mysql_error());
  $noshow_rows = mysql_num_rows($query1);

  if ($finished_rows - $noshow_rows >= 7){
    $user_grade="gold";
    $sql1 = "UPDATE customer_table set user_grade = '$user_grade' WHERE user_no = '$user_no'";
    mysql_query($sql1, $conn) or die(mysql_error());
    mysql_close($conn);
  }
  else if($finished_rows - $noshow_rows >=3){
    $user_grade="silver";
    $sql2 = "UPDATE customer_table set user_grade = '$user_grade' WHERE user_no = '$user_no'";
    mysql_query($sql2, $conn) or die(mysql_error());
    mysql_close($conn);
  }
    else{
    $user_grade="bronze";
    $sql3 = "UPDATE customer_table set user_grade = '$user_grade' WHERE user_no = '$user_no'";
    mysql_query($sql3, $conn) or die(mysql_error());
    mysql_close($conn);
  } 

?>