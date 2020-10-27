<?php
session_start();
  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

  $query = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_user_no='" .$_SESSION['user_no']. "'") or die(mysql_error());
    $total_rows = mysql_num_rows($query);
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
<h1>

</h1>
<h4 class="w3-border-bottom w3-border-light-grey w3-padding-16">예약 내역</h4>
<div class="w3-container w3-row w3-center w3-light-grey w3-padding-64">
  <div class="w3-quarter">
    <?php
      echo "<span class='w3-xxlarge'>" .$total_rows. "+</span>";
      ?>
    <br><a href='mypage'>전체</a>
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">6+</span>
    <br><a href="mypage_future.php">이용예정</a>
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">6+</span>
    <br><a href="mypage_past.php">이용완료</a>
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">2+</span>
    <br>취소/환불
  </div>
</div>
</div>


<?php 

     $query = mysql_query("SELECT resr_no,resr_rest_no, resr_date, resr_time, resr_total, reserver_name, reserver_tel, reserver_email, resr_requirement FROM reservation_table WHERE resr_user_no = '" .$_SESSION['user_no']. "'") or die(mysql_error());
     while($rows = mysql_fetch_array($query)){

        $resr_no = $rows["resr_no"];
        $resr_rest_no = $rows["resr_rest_no"];
        $resr_date = $rows["resr_date"];
        $resr_time = $rows["resr_time"];
        $resr_total = $rows["resr_total"];
        $reserver_name = $rows["reserver_name"];
        $reserver_tel = $rows["reserver_tel"];
        $reserver_email = $rows["reserver_email"];
        $resr_requirement = $rows["resr_requirement"];
        

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
     
?>
</body>
</html>