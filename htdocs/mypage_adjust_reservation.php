<?php
 session_start();

 $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }

     if($_SERVER["REQUEST_METHOD"] == "GET") {
      $resr_no = mysql_real_escape_string($_GET['resr_no']);

      $query = "SELECT resr_no, resr_date, resr_time, resr_total, reserver_name, reserver_tel, reserver_email, resr_requirement FROM reservation_table WHERE resr_no = '" .$resr_no. "'";

      $result = mysql_query($query) or die(mysql_error());
      if(mysql_num_rows($result)){
       while($rows = mysql_fetch_assoc($result)){
          $resr_no = $rows['resr_no'];
          $resr_date = $rows['resr_date'];
          $resr_time = $rows['resr_time'];
          $resr_total = $rows['resr_total'];
          $reserver_name = $rows['reserver_name'];
          $reserver_tel = $rows['reserver_tel'];
          $reserver_email = $rows['reserver_email'];
          $resr_requirement = $rows['resr_requirement'];

       }
  }
}


echo "
    <form action='reservation_adjust_post.php' method='post' onsubmit='return chk_frm()' name='reserve_adjust'>
   
   
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel='stylesheet' href='w3.css'>
 <script type='text/javascript'>
</script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: 'Raleway', Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
<title>예약 정보 수정</title>
<body>

 <div class='w3-row-padding'>
 <div class='w3-half w3-margin-bottom'>
 <div class='w3-container w3-white'>

 <h3 class='w3-border-bottom w3-border-light-grey w3-padding-16'>예약 정보 수정</h3>
        <label>Date</label>
        <input class='w3-input w3-border' type='text' name= 'resr_date' placeholder='" . $resr_date . "'>
        <label>Time</label>
        <input class='w3-input w3-border' type='text' name='resr_time' placeholder='" . $resr_time . "'>
        <label>people</label>
        <input class='w3-input w3-border' type='text' name='resr_total' placeholder='" . $resr_total ."'>
        <label>이름</label>
        <input class='w3-input w3-border' type='text' name='reserver_name' placeholder='" . $reserver_name . "'>
        <label>연락처</label>
        <input class='w3-input w3-border' type='text' name= 'reserver_tel' placeholder='" . $reserver_tel . "'>
        <label>E-mail</label>
        <input class='w3-input w3-border' type='text' name='reserver_email' placeholder='" . $reserver_email . "'>
        <label>요청사항</label>
        <input class='w3-input w3-border' type='text' name='resr_requirement' placeholder='" .$resr_requirement . "'>
        <input type='hidden' name='resr_no' value='" . $resr_no . "'>
        <input type='submit' class='w3-button w3-red w3-margin-top' value='예약 정보 수정 완료'>
        
             </div>
    </div>
</div>


<script>
    function chk_frm(){
    if(!document.reserve_adjust.resr_date.value){
      window.alert('예약할 날짜를 입력해 주세요');
      document.reserve_adjust.resr_date.focus();
      return false;
     }

    if(!document.reserve_adjust.resr_time.value){
      window.alert('예약할 시간을 입력해 주세요');
      document.reserve_adjust.resr_time.focus();
      return false;
     }
    if(!document.reserve_adjust.resr_total.value){
      window.alert('예약 인원 수를 입력해 주세요');
      document.reserve_adjust.resr_total.focus();
      return false;
     }
    if(!document.reserve_adjust.reserver_name.value){
      window.alert('예약자 이름을 입력해 주세요');
      document.reserve_adjust.reserver_name.focus();
      return false;
     }
    if(!document.reserve_adjust.reserver_tel.value){
      window.alert('예약자 연락처를 입력해주세요');
      document.reserve_adjust.reserver_tel.focus();
      return false;
     }
     if(!document.reserve_adjust.reserver_email.value){
      window.alert('예약자 이메일을 입력해주세요');
      document.reserve_adjust.reserver_email.focus();
      return false;
     }
     if(document.reserve_adjust.resr_total.value > $rest_max){
      window.alert('최대 예약 인원을 초과하였습니다.');
      document.reserve_adjust.resr_total.focus();
      return false;
     }
     
    return true;
}
</script>
</body>
</form>

        ";

?>
