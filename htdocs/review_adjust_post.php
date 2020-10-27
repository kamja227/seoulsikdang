<?php

session_start();

  $rev_resr_no = $_POST["rev_resr_no"];
  $rev_taste = $_POST["rev_taste"];
   $rev_price = $_POST["rev_price"];
   $rev_mood = $_POST["rev_mood"];
   $rev_kindness = $_POST["rev_kindness"];
   $rev_text = $_POST["rev_text"];

   $con= mysql_connect("localhost","root","950227");
    mysql_select_db("reservation2");

   $query = "UPDATE review_table SET rev_taste='$rev_taste', rev_price='$rev_price', rev_mood='$rev_mood', rev_kindness='$rev_kindness', rev_text = '$rev_text' WHERE rev_resr_no = $rev_resr_no ";

   $result = mysql_query($query,$con);
   mysql_query($query, $con)or die(mysql_error());

    if ($result){
    echo "<script>window.alert('리뷰가 수정 되었습니다.');</script>";
    echo "<script>location.href='mypage_finished.php';</script>";
 }