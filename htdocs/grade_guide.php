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
/*  $query = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_user_no='" .$_SESSION['user_no']. "'") or die(mysql_error());
    $total_rows = mysql_num_rows($query); */
  $query1 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_user_no='" .$_SESSION['user_no']. "' && resr_date >= curdate()") or die(mysql_error());
    $future_rows = mysql_num_rows($query1); // 이용예정
  $query2 = mysql_query("select resr_no, resr_date, resr_time, resr_total, resr_state,  reserver_name from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_date < curdate()) && (resr_state='이용예정'))") or die(mysql_error());
    $waiting_rows = mysql_num_rows($query2); // 예약심사
  $query3 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name, resr_state from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_state='예약완료'))") or die(mysql_error()); 
    $finished_rows = mysql_num_rows($query3);  // 예약완료  
  $query4 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name, resr_state from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && ((resr_state='예약취소') || (resr_state='노쇼')))") or die(mysql_error()); // 예약취소
    $canceled_rows = mysql_num_rows($query4); // 예약취소        

$grade_query= mysql_query("select user_name, user_grade from customer_table where user_no = '".$_SESSION['user_no']."'") or die(mysql_error());
 if (mysql_num_rows($grade_query)) {
 while($rows= mysql_fetch_array($grade_query)){
          $user_name = $rows["user_name"];
          $user_grade = $rows["user_grade"];
        }
    }

?>
<html>
<head>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel='stylesheet' href='w3.css'>
 <style>
 a:link {
  text-decoration : none;
}
 </style>
</head>
<body>
<p><font size="4">
<?php echo $user_name." 님은 ".$user_grade;
if ($user_grade=="bronze") {
  echo "<img src= '/images/bronze.png' width='30px' height='30x' class='w3-hover-opacity'>";
} 
elseif($user_grade=="silver"){
  echo "<img src= '/images/silver.png' width='30px' height='30x' class='w3-hover-opacity'>";
}
else {
  echo "<img src= '/images/gold.png' width='30px' height='30x' class='w3-hover-opacity'>";
}
echo" 등급 입니다.     ";
 ?></font><a href="grade_guide.php" class="w3-button"><font size="2">등급별 가이드</font></a></p>

<div class="w3-container w3-row w3-center w3-light-grey w3-padding-64">
  
  <div class="w3-quarter">
    <a href="mypage.php"><?php
      echo "<span class='w3-xxlarge'>" .$future_rows. "+</span>";
      ?>
    <br>이용예정</a>
  </div>
  <div class="w3-quarter">
    <a href="mypage_waiting.php"><?php
      echo "<span class='w3-xxlarge'>" .$waiting_rows. "+</span>";
      ?>
    <br>예약심사</a>
  </div>
  <div class="w3-quarter">
    <a href="mypage_finished.php"><?php
      echo "<span class='w3-xxlarge'>" .$finished_rows. "+</span>";
      ?>
    <br>이용완료</a>
  </div>
  <div class="w3-quarter">
    <a href="mypage_canceled.php"><?php
      echo "<span class='w3-xxlarge'>" .$canceled_rows. "+</span>";
      ?>
    <br>취소/환불</a>
  </div>
</div>
</div>
<h4 class="w3-border-bottom w3-border-light-grey w3-padding-16">등급별 가이드</h4>
  <div class="w3-row-padding" style="text-align:center">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src='/images/bronze.png' style="width:40%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <h4><b>브론즈</b></h4>
        <p>예약 점수 3점 미만 고객</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src='/images/silver.png' style="width:40%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <h4><b>실버</b></h4>
        <p>예약 점수 3점 이상 7점 미만 고객</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src='/images/gold.png' style="width:40%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <h4><b>골드</b></h4>
        <p>예약 점수 7점 이상 고객</p>
      </div>
    </div>
    </div>