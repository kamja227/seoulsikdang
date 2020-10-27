<?php
session_start();

$rev_user_no = $_SESSION["user_no"];
$rev_rest_no = $_POST["rev_rest_no"];
$rev_resr_no = $_POST["rev_resr_no"];
$rev_taste = $_POST["rev_taste"];
$rev_price = $_POST["rev_price"];
$rev_mood = $_POST["rev_mood"];
$rev_kindness = $_POST["rev_kindness"];
$rev_text = $_POST["rev_text"];

  $connect = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$connect);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }

$query = "INSERT INTO review_table(rev_user_no, rev_rest_no, rev_resr_no, rev_taste, rev_price, rev_mood, rev_kindness, rev_text) values('$rev_user_no','$rev_rest_no','$rev_resr_no','$rev_taste','$rev_price','$rev_mood','$rev_kindness','$rev_text')";


$result = mysql_query($query,$connect);
mysql_query($query, $connect)or die(mysql_error());

 if ($result){
    echo "<script>window.alert('리뷰가 등록되었습니다.');</script>";
    echo "<script>location.href='mypage_finished.php';</script>";
 }
 ?>