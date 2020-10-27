<?php
  session_start();

  
  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

   if($_SERVER["REQUEST_METHOD"] == "GET") {
      $resr_no = mysql_real_escape_string($_GET['resr_no']);
    }

   $resr_state = "예약취소";
   $sql = "UPDATE reservation_table SET resr_state= '$resr_state' WHERE resr_no = '$resr_no'";

     mysql_query($sql, $conn) or die(mysql_error());

     if(mysql_affected_rows($conn) == 0) {
      echo "예약 취소에 실패하였습니다.";
     }
     else {
     echo "<script>window.alert('예약이 취소되었습니다.');</script>";
     echo "<script>location.href='mypage_canceled.php';</script>";
      }
  
     mysql_close($conn);
?>