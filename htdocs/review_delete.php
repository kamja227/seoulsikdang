<?php
session_start();

  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
      $rev_resr_no = mysql_real_escape_string($_GET['resr_no']); 

$query = "DELETE FROM review_table WHERE rev_resr_no = '$rev_resr_no'"; 
 mysql_query($query, $conn) or die(mysql_error());

     if(mysql_affected_rows($conn) == 0) {
      echo " 리뷰 삭제에 실패했습니다. ";
     }
     else {

       echo "<script>window.alert('리뷰가 성공적으로 삭제되었습니다.');</script>";
        echo "<script>location.href='mypage_finished.php';</script>"; 
    }
}
 ?>