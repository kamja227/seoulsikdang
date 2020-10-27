<?php
session_start();
  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }
 /* $query = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_user_no='" .$_SESSION['user_no']. "'") or die(mysql_error());
 //   $total_rows = mysql_num_rows($query); */
  $query1 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_date >= curdate()) && (resr_state='이용예정'))") or die(mysql_error());
    $future_rows = mysql_num_rows($query1); // 이용예정
  $query2 = mysql_query("select resr_no, resr_date, resr_time, resr_total, resr_state,  reserver_name from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_date < curdate()) && (resr_state='이용예정'))") or die(mysql_error());
    $waiting_rows = mysql_num_rows($query2); // 예약심사

  $query3 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name, resr_state from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_state='예약완료'))") or die(mysql_error()); 
    $finished_rows = mysql_num_rows($query3);  // 예약완료  
  $query4 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name, resr_state from reservation_table where ((resr_user_no='" .$_SESSION['user_no']. "') && (resr_state='예약취소'))") or die(mysql_error());
    $canceled_rows = mysql_num_rows($query4); // 예약취소    

    $grade_query = mysql_query("select user_name, user_grade from customer_table where user_no = '".$_SESSION['user_no']."'") or die(mysql_error());
  if(mysql_num_rows($grade_query)) {
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


<?php 
     $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }
     $query = mysql_query("SELECT resr_no,resr_rest_no, resr_date, resr_time, resr_total, resr_state, reserver_name, reserver_tel, reserver_email, resr_requirement FROM reservation_table WHERE resr_user_no = '" .$_SESSION['user_no']. "' ORDER BY resr_date asc, resr_time asc") or die(mysql_error());
     while($rows = mysql_fetch_array($query)){

        $resr_no = $rows["resr_no"];
        $resr_rest_no = $rows["resr_rest_no"];
        $resr_date = $rows["resr_date"];
        $resr_time = $rows["resr_time"];
        $resr_total = $rows["resr_total"];
        $resr_state = $rows["resr_state"];
        $reserver_name = $rows["reserver_name"];
        $reserver_tel = $rows["reserver_tel"];
        $reserver_email = $rows["reserver_email"];
        $resr_requirement = $rows["resr_requirement"];
        $now = strtotime(date('Y-m-d', time()));
        $target = strtotime($resr_date);
        $diff = $target - $now;

        if(($diff<0) && ($resr_state=="이용예정")){

        $query1  =mysql_query("SELECT rest_name, rest_address from restaurant_table where rest_no ='" .$resr_rest_no."'")or die(mysql_error());
        while($rows= mysql_fetch_array($query1)){
          $rest_name = $rows["rest_name"];
          $rest_address = $rows["rest_address"];
        }

        echo "<h3>" .$rest_name. "</h3>";
        echo "<p>" .$rest_address. "</p></div>";
        echo "<div class='w3-half'>
              <div class='w3-card white'>
              <div class='w3-container w3-theme'>";
        echo "<ul class='w3-ul w3-border-top'>
        <li>
        <h4 class='w3-light-grey'>예약 정보 </h4>
        <p>예약번호 : " .$resr_no. "</p>
        <p> 예약 날짜 : " .$resr_date. "</p>
        <p> 예약 시간 :" .$resr_time. "</p>
        <p> 인원 : " .$resr_total. "명</p>
        </li>
        </div>
        </div>
        </div>
        </ul>";
        echo "<div class='w3-half'>
              <div class='w3-card white'>
              <div class='w3-container w3-theme'>";        
        echo "<ul class='w3-ul w3-border-top'>
        <li>
        <h4 class='w3-light-grey'>예약자 정보</h4>
        <p> 예약자 이름 : " .$reserver_name. "</p>
        <p> 예약자 연락처 :" .$reserver_tel. "</p>
        <p> 예약자 이메일 : " .$reserver_email. "</p>
        <p> 예약자 요청사항 : " .$resr_requirement. "</p>
        </li>
        </ul>
        </div>
        </div>
        </div>";     

        echo " 
        <div class='w3-button w3-blue w3-margin-top'><a href='reservation_adjust.php?resr_no=" .$resr_no. "'>수정/변경 </a></div>
        <div class='w3-button w3-red w3-margin-top'><a href='reservation_delete.php?resr_no=" .$resr_no. "'>예약 취소 </a></div>
         ";

        }
     }
     
?>
</body>
</html>