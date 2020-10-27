<?php

session_start();

   $resr_no = $_POST["resr_no"];
   $resr_date = $_POST["resr_date"];
   $resr_time = $_POST["resr_time"];
   $resr_total = $_POST["resr_total"];
   $reserver_name = $_POST["reserver_name"];
   $reserver_tel = $_POST["reserver_tel"];
   $reserver_email = $_POST["reserver_email"];
   $resr_requirement = $_POST["resr_requirement"];

   $connect = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$connect);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }


     $sql = "UPDATE reservation_table SET  resr_date='$resr_date', resr_time='$resr_time', resr_total='$resr_total', reserver_name='$reserver_name', reserver_tel='$reserver_tel', reserver_email='$reserver_email', resr_requirement='$resr_requirement' WHERE resr_no = '$resr_no'";

     mysql_query($sql, $connect) or die(mysql_error());

     if(mysql_affected_rows($connect) == 0) {
      echo " 회원 정보 수정에 실패했습니다. ";
     }
     else {

       echo "<script>window.alert('$reserver_name 님의 예약 정보가 변경되었습니다.');</script>";

         echo "<div class='w3-half'>
              <div class='w3-card white'>
              <div class='w3-container w3-theme'>";
        echo "<ul class='w3-ul w3-border-top'>
        <li>
        <h4 class='w3-light-grey'>예약 정보 </h4>
        
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

     }
     mysql_close($connect);
    

?>