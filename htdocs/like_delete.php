<?php

session_start();

 $user_no = $_SESSION["user_no"];

 $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }

     if($_SERVER["REQUEST_METHOD"] == "GET") {
      $rest_no = mysql_real_escape_string($_GET['rest_no']);
  

    $sql = "DELETE FROM like_table WHERE (like_user_no='$user_no' AND like_rest_no='$rest_no')";

    mysql_query($sql, $conn) or die(mysql_error());

     if(mysql_affected_rows($conn) == 0) {
      echo " 에러!";
  }
   	else echo "<script>window.alert('좋아요를 취소하셨습니다.');location.href='like.php';</script>";
}
  mysql_close($conn);

?>