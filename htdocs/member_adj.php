<script>
 function chk_frm(){

   if(!document.join.rest_id.value){
    window.alert('아이디를 입력해 주세요');
    document.join1.user_id.focus();
    return false;
   }
   
   if(!document.join.rest_password.value){
    window.alert('비밀번호를 입력해 주세요');
    document.join1.user_password.focus();
    return false;
   }
    if(!document.join.user_pw2.value){
    window.alert('비밀번호 확인을 입력해 주세요');
    document.join.user_pw2.focus();
    return false;
   }
    if(!document.join.rest_user_name.value){
    window.alert('이름을 입력해 주세요');
    document.join.rest_user_name.focus();
    return false;
   }
    if(!document.join.rest_user_birthday.value){
    window.alert('생일을 입력해 주세요');
    document.join.rest_user_birthday.focus();
    return false;
   }
    if(!document.join.rest_user_tel.value){
    window.alert('연락처를 입력해 주세요');
    document.join.rest_user_tel.focus();
    return false;
   }
    
   if(!document.join.rest_address.value){
    window.alert('주소를 입력해 주세요');
    document.join.rest_address.focus();
    return false;
   }
    
    
 
 return true;  
 }


</script>

 
<form action="member_post_adj.php" method="post" onsubmit="return chk_frm()" name="join">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="w3.css">
 <script type="text/javascript">
 </script>
 <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}
 </style>
 <title> 회원가입 </title>
 <body>
<div class="w3-row-padding">
 <div class="w3-half w3-margin-bottom">
  <div class="w3-container w3-white">
   <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"> 개인회원 회원가입 </h3>
   <label>아이디</label>
   <input type=text name=user_id class="w3-input w3-border" placeholder="id를 입력해주세요">
   <label>비밀번호</label>
   <input type=password name=user_password class="w3-input w3-border" placeholder="pw를 입력해주세요">
   <label>비밀번호 확인</label>
   <input type=password name=user_pw2 class="w3-input w3-border" placeholder="pw확인을 입력해주세요">
   <label>이름</label>
   <input type=text name=user_name class="w3-input w3-border" placeholder="이름을 입력해주세요">
   <label>성별</label>
  </div>
  <div class="w3-container w3-white">
   <input type="radio" name="user_gender" <?php if(isset($gender)&& $gender=="여자") echo "checked"?> value="여자" />여자
   <input type="radio" name="user_gender" <?php if(isset($gender)&& $gender=="남자") echo "checked"?> value="남자" />남자
  </div>
  <div class="w3-container w3-white">
   <label>생일</label>
   <input type=text name=user_birthday class="w3-input w3-border" placeholder="YYYY-MM-DD">
   <label>연락처</label>
   <input type=text name=user_tel class="w3-input w3-border" placeholder="###-####-####">
   <label>주소</label>
   <input type=text name=user_address class="w3-input w3-border" placeholder="주소를 입력해주세요">
  </div>
 </div>
 <div class="w3-container w3-white">
   <input type=submit class="w3-button w3-red w3-margin-top" value='회원가입'>
  </div>
 <div class="w3-half w3-margin-bottom">
  
 </div>
</div>
</body>
</form>