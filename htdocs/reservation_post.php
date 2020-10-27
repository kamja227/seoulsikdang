<?php

session_start();

   $resr_user_no = $_SESSION["user_no"];
   $resr_rest_no = $_POST["rest_no"];
   $resr_date = $_POST["resr_date"];
   $resr_time = $_POST["resr_time"];
   $resr_total = $_POST["resr_total"];
   $resr_max = $_POST["resr_max"];
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

     $query = "insert into reservation_table(resr_user_no, resr_rest_no, resr_date, resr_time, resr_total, resr_max, reserver_name, reserver_tel, reserver_email, resr_requirement) 
     values('$resr_user_no', '$resr_rest_no', '$resr_date','$resr_time','$resr_total', '$resr_max', '$reserver_name','$reserver_tel','$reserver_email','$resr_requirement')";

     mysql_query($query, $connect)or die(mysql_error());

     mysql_close($connect);

echo "<script>window.alert('예약이 완료되었습니다.');</script>";
    //    location.href='mypage.php';</script>";

   echo "
    <!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='w3.css'>
<title></title>
</head>
<body><div class='w3-half'>
              <div class='w3-card white'>
              <div class='w3-container w3-theme'>";
        echo "<ul class='w3-ul w3-border-top'>
        <li>
        <h4 class='w3-light-grey'>예약 정보 </h4>
        <p></p>
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
        </div></body></html>";
          
 
     

?>
