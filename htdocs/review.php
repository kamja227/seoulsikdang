<?php
session_start();

  $conn = mysql_connect('localhost','root','950227');
  $db_status = mysql_select_db('reservation2',$conn);
  if (!$db_status)
  {
    echo("DB_ERROR");
   exit;
  }

  if($_SERVER["REQUEST_METHOD"] == "GET"){
      $resr_no = mysql_real_escape_string($_GET['resr_no']); 

  $query = mysql_query("SELECT resr_no, resr_rest_no, resr_date, resr_time FROM reservation_table WHERE resr_no = '" .$resr_no. "'") or die(mysql_error());

     while($rows = mysql_fetch_array($query)){


        $resr_rest_no = $rows["resr_rest_no"];
        $resr_date = $rows["resr_date"];
        $resr_time = $rows["resr_time"];

         $query1  =mysql_query("SELECT rest_name from restaurant_table where rest_no ='" .$resr_rest_no."'")or die(mysql_error());
        while($rows= mysql_fetch_array($query1)){
          $rest_name = $rows["rest_name"];
      }
      echo 
        "<html><head>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link rel='stylesheet' href='w3.css'>
          <body>
          <div class='w3-row-padding'>
          <div class='w3-half w3-margin-bottom'>
          <div class='w3-container w3-white'>
          <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'>" . $rest_name . "</h2>";

          echo "<p><font size='3'> 예약 번호 : " . $resr_no . "</font></p>";
          echo "<p><font size='3'> 예약 날짜 : " . $resr_date . "</font></p>";
          echo "<p><font size='3'> 예약 시간 : " . $resr_time . "</font></p>
          </div></div><div></body></head></html>";

    }
}


echo"
<!DOCTYPE html>
<!--suppress CssUnusedSymbol, JSUnresolvedLibraryURL -->
<html lang='en'>
<head>
    <meta charset='UTF-8'/>
   <meta charset='UTF-8'/>
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
    <script>
  //<![CDATA[
    function fc_chk_byte(aro_name,ari_max) {
      var ls_str = aro_name.value;
      var li_str_len = ls_str.length;
      var li_max = ari_max;
      var i = li_byte = li_len = 0;
      var ls_one_char = ls_str2 = '';
      for(i=0; i< li_str_len; i++) {
        ls_one_char = ls_str.charAt(i);
        li_byte++;
        
        if(li_byte <= li_max){
          li_len = i + 1;
        }
      }
      if(li_byte > li_max) {
        alert( li_max + 'byte, 초과 ');
        ls_str2 = ls_str.substr(0, li_len);
        aro_name.value = ls_str2;
        document.sms.char_byte.value = 80;
      }else {
        document.sms.char_byte.value = li_byte;
      }
      aro_name.focus();
    }
  //]]>
 </script>

<body>
    <div class='w3-half'>
    <div class='w3-container w3-white'>
    <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'>리뷰 작성</h2>
<div class='container'>
<form action='review_post.php' name='review' method='post'>
   <p><label>맛</label>
    <input type='text' class='rating rating-loading' value='0' name='rev_taste' data-min='0' data-max='5'  data-step='0.5' data-size='xs'>
   <p><label>가격</label>
 <input type='text' class='rating rating-loading' value='0' name='rev_price' data-min='0' data-max='5'  data-step='0.5' data-size='xs'>   
  <p><label>분위기</label>
    <input type='text' class='rating rating-loading' value='0' name='rev_mood' data-min='0' data-max='5'  data-step='0.5' data-size='xs'>
   <p><label>친절함</label>
  <input type='text' class='rating rating-loading' value='0' name='rev_kindness' data-min='0' data-max='5'  data-step='0.5' data-size='xs'>
   <p><label>고객 후기</label></p>
   <p>
 <textarea name='rev_text' cols='80' rows='7' onkeyup='fc_chk_byte(this, 500)' placeholder=' 100자 미만 입력 가능'></textarea></p>
    <input type='hidden' name='rev_resr_no' value='" .$resr_no. "'>
    <input type='hidden' name='rev_rest_no' value='" .$resr_rest_no. "'> 
    <input type='submit' class='w3-button w3-red w3-margin-top' value='작성 완료'>

    </form></div></div></div></body></head></html>
    ";
?>