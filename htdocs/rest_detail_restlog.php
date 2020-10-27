<?php 
  session_start();

  echo "<script>parent.frames.home_menu.location.href='top.php';</script>";

     $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2', $conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }
    
     if($_SERVER["REQUEST_METHOD"] == "GET"){
      $rest_no = mysql_real_escape_string($_GET['rest_no']);

      $query = "SELECT rest_name, rest_tel, rest_address, rest_opentime, rest_mainmenu, rest_bronze_max, rest_silver_max, rest_gold_max, rest_message FROM restaurant_table WHERE rest_no = '" .$rest_no. "'";

       $result = mysql_query($query) or die(mysql_error());
      if(mysql_num_rows($result)){
       while($rows = mysql_fetch_assoc($result)){
          $rest_name = $rows['rest_name'];
          $rest_tel = $rows['rest_tel'];
          $rest_address = $rows['rest_address'];
          $rest_opentime = $rows['rest_opentime'];
          $rest_mainmenu = $rows['rest_mainmenu'];
          $rest_bronze_max = $rows['rest_bronze_max'];
          $rest_silver_max = $rows['rest_silver_max'];
          $rest_gold_max = $rows['rest_gold_max'];
          $rest_message = $rows['rest_message'];
          echo" 
          
          <head>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link rel='stylesheet' href='w3.css'>
          </head>
          <body>
          <div class='w3-row-padding'>
          <div class='w3-half w3-margin-bottom'>
          <div class='w3-container w3-white'>
          <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'>" . $rest_name . "</h2>"; 


               echo "<p> 연락처 : " . $rest_tel . "</p>";
          echo "<p> 주소 : " . $rest_address . "</p>";
          echo "<p> 오픈시간 : " . $rest_opentime . "</p>";
          echo "<p> 메인메뉴 : " . $rest_mainmenu . "</p>";
          echo "<p> 식당 개별 공지 : " . $rest_message . "</p>";
          echo "<p> 브론즈 회원 최대 예약 인원 : " . $rest_bronze_max . "</p>";
          echo "<p> 실버 회원 최대 예약 인원 : " . $rest_silver_max . "</p>";
          echo "<p> 골드 회원 최대 예약 인원 : " . $rest_gold_max . "</p>";
            }
            }
        }
    

?>