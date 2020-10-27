<?php
  session_start();
  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

    $query = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_rest_no='" .$_SESSION['rest_no']. "'") or die(mysql_error());
    $total_rows = mysql_num_rows($query);
  $query1 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_rest_no='" .$_SESSION['rest_no']. "'&& resr_date >= curdate()") or die(mysql_error());
    $future_rows = mysql_num_rows($query1);
  $query2 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_rest_no='" .$_SESSION['rest_no']. "'&& resr_date < curdate()") or die(mysql_error());
    $past_rows = mysql_num_rows($query2);
  $query3 = mysql_query("select resr_no, resr_date, resr_time, resr_total, reserver_name from reservation_table where resr_rest_no='" .$_SESSION['rest_no']. "'&& resr_state = '예약취소'") or die(mysql_error());
    $cancel_rows = mysql_num_rows($query3);

?>
<html>
<head>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel='stylesheet' href='w3.css'>
</head>
<body>
 <div class='w3-row-padding'>
  <div class='w3-margin-bottom'>
    <div class='w3-container w3-white'>
    <?php
    echo  "<h1>" .$_SESSION['rest_name']. "</h1>";
    ?>
    <div class="w3-container w3-row w3-center w3-light-grey w3-padding-64">
    <div class="w3-quarter">
      <a style="text-decoration:none" href="admin.php"><?php
      echo "<span class='w3-xxlarge'>" .$total_rows. "+</span>";
      ?>
      <br>전체예약</a>
    </div>
    <div class="w3-quarter">
      <a style="text-decoration:none" href="admin_future.php"><?php
      echo "<span class='w3-xxlarge'>" .$future_rows. "+</span>";
      ?>
      <br>신규예약</a>
    </div>
    <div class="w3-quarter">
      <a style="text-decoration:none" href="admin_canceled.php"><?php
      echo "<span class='w3-xxlarge'>" .$cancel_rows. "+</span>";
      ?>
      <br>예약취소/노쇼</a>
    </div>
    <div class="w3-quarter">
      <a style="text-decoration:none" href="admin_finished.php"><?php
      echo "<span class='w3-xxlarge'>" .$past_rows. "+</span>";
      ?>
      <br>예약완료</a>
    </div>
    </div>
    </div>
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">전체 예약</h3>
    <table class='w3-table w3-striped w3-white'>
      <tr>
      <td>예약날짜</td>
      <td>예약시간</td>
      <td>예약자명</td>
      <td>연락처</td>
      <td>예약인원</td>
      <td>예약번호</td>
      <td>예약상태</td>
    </tr>

<?php 
     
     $query = mysql_query("SELECT resr_no, resr_date, resr_time, resr_total, reserver_name, reserver_tel, resr_state FROM reservation_table WHERE resr_rest_no='" .$_SESSION['rest_no']. "' ORDER BY resr_date asc, resr_time asc") or die(mysql_error());

     while($rows = mysql_fetch_array($query)){
      $resr_no = $rows['resr_no'];
      $resr_date = $rows['resr_date'];
      $resr_time = $rows['resr_time'];
      $resr_total = $rows['resr_total'];
      $reserver_name = $rows['reserver_name'];
      $reserver_tel = $rows['reserver_tel'];
      $resr_state = $rows['resr_state'];
      $now = time();
      $target = strtotime($resr_date);
      $diff = $target - $now;

    
        if ($resr_state == "예약완료") {
          echo "<tr>";
      echo "<td>" .$resr_date. "</td>";
      echo "<td>" .$resr_time. "</td>";
      echo "<td>" .$reserver_name. "</td>";
      echo "<td>" .$reserver_tel. "</td>";
      echo "<td>" .$resr_total. "</td>";
      echo "<td>" .$resr_no. "</td>";
      echo "<td>" .$resr_state. "</td></tr>";
    
    }
  }
    
?>
    </table>
    </div>
  </div>
 </div>
 </body>