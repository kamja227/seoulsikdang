<?php

session_start();

$rest_no = $_POST["rest_no"];
$user_no = $_SESSION["user_no"];

  
$connect = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2', $connect);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }
       $query0 = mysql_query ("SELECT like_user_no, like_rest_no FROM like_table WHERE (like_user_no='$user_no' AND like_rest_no='$rest_no')")or die(mysql_error());

        $numrow = mysql_num_rows($query0);
        if($numrow > 0) { echo "<script>window.alert('이미 좋아요를 누르셨습니다.');location.href='like.php';</script>"; }
        else {
 	    $query = "INSERT INTO like_table(like_user_no, like_rest_no) VALUES('$user_no', '$rest_no')"; }


     mysql_query($query, $connect)or die(mysql_error());   	
     mysql_close($connect);

     echo "<script>window.alert('좋아요를 누르셨습니다.');location.href='like.php';</script>";

?>