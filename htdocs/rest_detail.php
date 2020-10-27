<?php 
  session_start();
  $user_no = $_SESSION["user_no"];
 echo "<script>parent.frames.home_menu.location.href='top.php';</script>";

 if(!$user_no) {
  echo "<script>location.href='login.php';</script>";
 }
 else {



     $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2', $conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }
    
     if($_SERVER["REQUEST_METHOD"] == "GET"){
      $rest_no = mysql_real_escape_string($_GET['rest_no']);

      $query1 = "SELECT user_grade FROM customer_table where user_no = '" .$user_no. "'";
      $result1 = mysql_query($query1) or die(mysql_error());
      if(mysql_num_rows($result1)){
      while($rows = mysql_fetch_assoc($result1)){
      $user_grade = $rows["user_grade"]; 

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
          if($user_grade=="bronze"){
          $rest_max=$rest_bronze_max;
          }
          else if($user_grade=="silver"){
          $rest_max=$rest_silver_max;
          }
          else{
            $rest_max=$rest_gold_max;
          }

          echo"<html>
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
          <form style='float:left;margin:3px' action='like_post.php' method='post' name='like'>
          <input type='hidden' name='rest_no' value='" . $rest_no . "'>
          <input type='image' src='/images/like.png' width='30px' height='30px' class='w3-hover-opacity'>
          </form></h2>";

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
    }
  }

    echo "
   
    <form action='reservation_post.php' method='post' onsubmit='return chk_frm()' name='reserve'>
    </div>
    </div>
    <div class='w3-half'>
    <div class='w3-container w3-white'>
    <h2 class='w3-border-bottom w3-border-light-grey w3-padding-16'></br></h2>
       


 <!DOCTYPE html>
<html>
<head>

    <link href='./bootstrap/css/bootstrap.min.css' rel='stylesheet' media='screen'>
    <link href='./css/bootstrap-datetimepicker.min.css' rel='stylesheet' media='screen'>
</head>

<body>
<div class='container'>
        <fieldset>

               <div class='control-group'>
                 <label class='control-label'>예약 날짜</label>
                 <div class='controls input-append date form_date' data-date='' data-date-format='yyyy-mm-dd' data-link-field='dtp_input2'  data-link-format='yyyy-mm-dd'>
                    <input size='16' type='text' name=resr_date value='' readonly>
                    <span class='add-on'><i class='icon-remove'></i></span>
          <span class='add-on'><i class='icon-th'></i></span>
                </div>
        <input type='hidden' id='dtp_input2' value='' /><br/>
</div>
<div class='control-group'>
                <label class='control-label'>예약 시간</label>
                <div class='controls input-append date form_time' data-date='' data-date-format='hh:ii' data-link-field='dtp_input3' data-link-format='hh:ii'>
                    <input size='16' type='text' name=resr_time value='' readonly>
                    <span class='add-on'><i class='icon-remove'></i></span>
          <span class='add-on'><i class='icon-th'></i></span>
                </div>
        <input type='hidden' id='dtp_input3' value='' /><br/>
            </div>
        </fieldset>

</div>

<script type='text/javascript' src='./jquery/jquery-1.8.3.min.js' charset='UTF-8'></script>
<script type='text/javascript' src='./bootstrap/js/bootstrap.min.js'></script>
<script type='text/javascript' src='./js/bootstrap-datetimepicker.js' charset='UTF-8'></script>
<script type='text/javascript' src='./js/locales/bootstrap-datetimepicker.ko.js' charset='UTF-8'></script>
<script type='text/javascript'>

  $('.form_date').datetimepicker({
        language:  'ko',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_time').datetimepicker({
        language:  'ko',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0
    });
</script>

</body>
</html>

 

        <label>예약인원</label>
        <input class='w3-input w3-border' type='text' height='5px' name='resr_total' placeholder='최대 " . $rest_max. " 명 '>
        <label>이름</label>
        <input class='w3-input w3-border' type='text' height='5px' name='reserver_name' placeholder='Name'>
        <label>연락처</label>
        <input class='w3-input w3-border' type='text' height='5px' name= 'reserver_tel' placeholder='###-####-####'>
        <label>E-mail</label>
        <input class='w3-input w3-border' type='text' height='5px' name='reserver_email' placeholder='Your Email address'>
        <label>요청사항</label>
        <input class='w3-input w3-border' type='text' height='5px' name='resr_requirement' placeholder='간단하게 적어주세요.'>
        <input type='hidden' name='rest_no' value='" . $rest_no . "'>
        <input type='hidden' name='resr_max' value='" . $rest_max . "'> "; // reservation_table  에 resr_max 추가->현재 예약의 최대 예약 인원 저장 하여 예약 수정시 오류 해결 
        <input type='submit' class='w3-button w3-red w3-margin-top' value='예약하기'>
        
        
     </div>
    </div>
</div>

  <script>
    function chk_frm(){
    if(!document.reserve.resr_date.value){
      window.alert('예약할 날짜를 입력해 주세요');
      document.reserve.resr_date.focus();
      return false;
     }

    if(!document.reserve.resr_time.value){
      window.alert('예약할 시간을 입력해 주세요');
      document.reserve.resr_time.focus();
      return false;
     }
    if(!document.reserve.resr_total.value){
      window.alert('예약 인원 수를 입력해 주세요');
      document.reserve.resr_total.focus();
      return false;
     }
    if(!document.reserve.reserver_name.value){
      window.alert('예약자 이름을 입력해 주세요');
      document.reserve.reserver_name.focus();
      return false;
     }
    if(!document.reserve.reserver_tel.value){
      window.alert('예약자 연락처를 입력해주세요');
      document.reserve.reserver_tel.focus();
      return false;
     }
     if(!document.reserve.reserver_email.value){
      window.alert('예약자 이메일을 입력해주세요');
      document.reserve.reserver_email.focus();
      return false;
     }
     if(document.reserve.resr_total.value > $rest_max){
      window.alert('최대 예약 인원을 초과하였습니다.');
      document.reserve.resr_total.focus();
      return false;
     }
     
    return true;
}
</script>
</body>

</form>


";

}

?>