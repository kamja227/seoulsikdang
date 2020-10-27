<?php 
  session_start();
  
echo "<script>parent.frames.home_menu.location.href='top.php';</script>
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='kartik-v-bootstrap-star-rating-a779c97/css/star-rating.css' media='all' type='text/css'/>
    <link rel='stylesheet' href='kartik-v-bootstrap-star-rating-a779c97/css/themes/krajee-fa/theme.css' media='all' type='text/css'/>
    <link rel='stylesheet' href='kartik-v-bootstrap-star-rating-a779c97/css/themes/krajee-svg/theme.css' media='all' type='text/css'/>
    <link rel='stylesheet' href='kartik-v-bootstrap-star-rating-a779c97/css/themes/krajee-uni/theme.css' media='all' type='text/css'/>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
    <script src='kartik-v-bootstrap-star-rating-a779c97/js/star-rating.js' type='text/javascript'></script>
    <script src='kartik-v-bootstrap-star-rating-a779c97/js/themes/krajee-fa/theme.js' type='text/javascript'></script>
    <script src='kartik-v-bootstrap-star-rating-a779c97/js/themes/krajee-svg/theme.js' type='text/javascript'></script>
    <script src='kartik-v-bootstrap-star-rating-a779c97/js/themes/krajee-uni/theme.js' type='text/javascript'></script>

";
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
          $ave_taste=0;
          $ave_price=0;
          $ave_mood=0;
          $ave_kindness=0;
          $ave_rest=0;

          $query_ave= "SELECT rev_taste, rev_price, rev_mood, rev_kindness FROM review_table WHERE rev_rest_no = '" .$rest_no. "'"; 
          $result = mysql_query($query_ave) or die(mysql_error()); 
          if(mysql_num_rows($result)){ 
          while($rows = mysql_fetch_array($result)){
              
              $rev_taste = $rows["rev_taste"];
              $rev_price = $rows["rev_price"];
              $rev_mood = $rows["rev_mood"];
              $rev_kindness = $rows["rev_kindness"];
              $ave_taste+=$rev_taste;
              $ave_price+=$rev_price;
              $ave_mood+=$rev_mood;
              $ave_kindness+=$rev_kindness;
              $ave_rest+=($rev_taste+$rev_price+$rev_mood+$rev_kindness);

     }
     $ave_taste=round($ave_taste/mysql_num_rows($result),1);
     $ave_price=round($ave_price/mysql_num_rows($result),1);
     $ave_mood=round($ave_mood/mysql_num_rows($result),1);
     $ave_kindness=round($ave_kindness/mysql_num_rows($result),1);
     $ave_rest=round($ave_rest/mysql_num_rows($result),1);
     $ave_rest=round($ave_rest/4,1);

   }



      if($_SESSION['user_id']!=NULL) {
          echo" 
          
          <head>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link rel='stylesheet' href='w3.css'>
          </head>
          <body>
          <div class='w3-row-padding'>
          <div class='w3-half w3-margin-bottom'>
          <div class='w3-container w3-white'>
          <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'>
          " . $rest_name . "
          <form style='float:left;margin:3px;' action='like_post.php' method='post' name='like'>
          <input type='hidden' name='rest_no' value='" . $rest_no . "'>
          <input type='image' src='/images/like.png' width='30px' height='30px' class='w3-hover-opacity'>
          </form></h2>";
          
          
          echo "<p><input type='text' class='rating rating-loading' value='$ave_rest' data-min='0' data-max='5'  data-step='0.5' data-size='xs' readonly></p>";
          echo "<p>맛 : $ave_taste 가격 : $ave_price 분위기 : $ave_mood 친절함 : $ave_kindness </p>";
          echo "<p> 연락처 : " . $rest_tel . "</p>";
          echo "<p> 주소 : " . $rest_address . "</p>";
          echo "<p> 오픈시간 : " . $rest_opentime . "</p>";
          echo "<p> 메인메뉴 : " . $rest_mainmenu . "</p>";
          echo "<p> 식당 개별 공지 : " . $rest_message . "</p>

          ";

          echo"<a href='rest_detail.php?rest_no=" .$rest_no. "' class='w3-bar-item w3-button'> 예약하기 </a>
          </div></div>
          ";
        }

        else {
            echo" 
          
          <head>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link rel='stylesheet' href='w3.css'>
          </head>
          <body>
          <div class='w3-row-padding'>
          <div class='w3-half w3-margin-bottom'>
          <div class='w3-container w3-white'>
          <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'>
          " . $rest_name . "
          <form style='float:left;margin:3px;' action='like_post.php' method='post' name='like'>
          <input type='hidden' name='rest_no' value='" . $rest_no . "'>
          <input type='image' src='/images/like.png' width='30px' height='30px' class='w3-hover-opacity'>
          </form></h2>";

          echo "<p><input type='text' class='rating rating-loading' value='$ave_rest' data-min='0' data-max='5'  data-step='0.5' data-size='xs' readonly></p>";
          echo "<p>맛 : $ave_taste 가격 : $ave_price 분위기 : $ave_mood 친절함 : $ave_kindness </p>";

          echo "<p> 연락처 : " . $rest_tel . "</p>";
          echo "<p> 주소 : " . $rest_address . "</p>";
          echo "<p> 오픈시간 : " . $rest_opentime . "</p>";
          echo "<p> 메인메뉴 : " . $rest_mainmenu . "</p>";
          echo "<p> 식당 개별 공지 : " . $rest_message . "</p>";
          echo"


          ";

          echo" 
          <form  action='login_restdetail2.php' method='post' name='login_restdetail2'>
          <input type='hidden' name='rest_no' value='" . $rest_no . "'>
          <input type='submit' class='w3-button w3-red w3-margin-top' value='예약하기'></form>
          </div></div>
          ";
        }

        echo "<div class='w3-half w3-margin-bottom'>
          <div class='w3-container w3-white'>
          <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'></br></h2>";

        $query0= "SELECT rev_user_no,rev_taste, rev_price, rev_mood, rev_kindness,rev_text FROM review_table WHERE rev_rest_no = '" .$rest_no. "'"; 
          $result = mysql_query($query0) or die(mysql_error()); 
          if(mysql_num_rows($result)){ 
          while($rows = mysql_fetch_array($result)){

              $rev_user_no = $rows["rev_user_no"];              
              $rev_taste = $rows["rev_taste"];
              $rev_price = $rows["rev_price"];
              $rev_mood = $rows["rev_mood"];
              $rev_kindness = $rows["rev_kindness"];
              $rev_text= $rows["rev_text"];


              $query1 ="SELECT user_id FROM customer_table WHERE user_no = '" .$rev_user_no. "'";
              $result1 = mysql_query($query1) or die(mysql_error()); 
              if(mysql_num_rows($result1)){ 
              while($rows = mysql_fetch_array($result1)){
              $user_id = $rows["user_id"];   
            


            echo"
            <p>작성자 : $user_id</p>
            <p>맛 : $rev_taste 가격 : $rev_price 분위기 : $rev_mood 친절함 : $rev_kindness </p>
            <p><textarea name='rev_text' placeholder='$rev_text' cols='80' rows='7' readonly='readonly' disabled></textarea></p>
            ";
          }}

     
     }
   }

          echo"</div></body></form>";

            }
        }
      }
 

?>