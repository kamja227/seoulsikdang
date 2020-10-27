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

 
<form action="rest_member_post.php" method="post" onsubmit="return chk_frm()" name="join">
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
   <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"> 사업자 회원가입 </h3>
   <label>아이디</label>
   <input type=text name=rest_id class="w3-input w3-border" placeholder="id를 입력해주세요">
   <label>비밀번호</label>
   <input type=password name=rest_password class="w3-input w3-border" placeholder="pw를 입력해주세요">
   <label>비밀번호 확인</label>
   <input type=password name=user_pw2 class="w3-input w3-border" placeholder="pw확인을 입력해주세요">
   <label>사업자 이름</label>
   <input type=text name=rest_user_name class="w3-input w3-border" placeholder="이름을 입력해주세요">
   <label>사업자 성별</label>
  </div>
  <div class="w3-container w3-white">
   <input type="radio" name="rest_user_gender" <?php if(isset($gender)&& $gender=="여자") echo "checked"?> value="여자" />여자
   <input type="radio" name="rest_user_gender" <?php if(isset($gender)&& $gender=="남자") echo "checked"?> value="남자" />남자
  </div>
  <div class="w3-container w3-white">
   <label>사업자 생일</label>
   <input type=text name=rest_user_birthday class="w3-input w3-border" placeholder="YYYY-MM-DD">
   <label>사업자 연락처</label>
   <input type=text name=rest_user_tel class="w3-input w3-border" placeholder="###-####-####">
  </div>
 </div>
 <div class="w3-half w3-margin-bottom">
  <div class="w3-container w3-white">
   <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"> 식당 등록 </h3>
   <label>식당 이름</label>
   <input type=text name=rest_name class="w3-input w3-border" placeholder="이름을 입력해주세요">
   <label>식당 연락처</label>
   <input type=text name=rest_tel class="w3-input w3-border" placeholder="##-####-####">
   <label>식당 주소</label>
   <input type=text name=rest_address class="w3-input w3-border" placeholder="주소를 입력해주세요">
   <label>오픈 시간</label>
   <input type=text name=rest_opentime class="w3-input w3-border"  placeholder="매일 11:30 - 22:00">
   <label>주 메뉴</label>
   <input type=text name=rest_mainmenu class="w3-input w3-border" placeholder="주 메뉴를 입력해주세요">
   <label>브론즈 회원 예약 허용 인원</label>
   <input type=text name=rest_bronze_max class="w3-input w3-border" placeholder=" # 숫자로 입력해 주세요.">
    <label>실버 회원 예약 허용 인원</label>
   <input type=text name=rest_silver_max class="w3-input w3-border" placeholder=" # 숫자로 입력해 주세요.">
   <label>골드 회원 예약 허용 인원</label>
   <input type=text name=rest_gold_max class="w3-input w3-border" placeholder=" # 숫자로 입력해 주세요.">
  </div>  
  <div class="w3-container w3-white">
  <p></p>
  <label> 테마 카테고리 지정</label>
  </div>
  <p></p>
  <div class="w3-container w3-white">
   <select name="theme_location">
   <option value=" "> 테마 : 동네 </option>
   <option <?php if ($row['theme_location']=="가로수길"): ?> selected="selected"<?php endif; ?>> 가로수길 </option>
    <option <?php if ($row['theme_location']=="고속터미널"): ?> selected="selected"<?php endif; ?>> 고속터미널 </option> 
    <option <?php if ($row['theme_location']=="홍대"): ?> selected="selected"<?php endif; ?>> 홍대 </option>
    <option <?php if ($row['theme_location']=="이태원"): ?> selected="selected"<?php endif; ?>>이태원</option>   
    <option <?php if ($row['theme_location']=="상수"): ?> selected="selected"<?php endif; ?>>상수</option>
    <option <?php if ($row['theme_location']=="강남"): ?> selected="selected"<?php endif; ?>> 강남</option>
    <option <?php if ($row['theme_location']=="신촌"): ?> selected="selected"<?php endif; ?>> 신촌 </option>
    <option <?php if ($row['theme_location']=="명동"): ?> selected="selected"<?php endif; ?>> 명동 </option>
    <option <?php if ($row['theme_location']=="대학로"): ?> selected="selected"<?php endif; ?>> 대학로 </option>
    <option <?php if ($row['theme_location']=="연남동"): ?> selected="selected"<?php endif; ?>> 연남동 </option>
    <option <?php if ($row['theme_location']=="합정"): ?> selected="selected"<?php endif; ?>> 합정 </option>
    <option <?php if ($row['theme_location']=="여의도"): ?> selected="selected"<?php endif; ?>> 여의도 </option>
    <option <?php if ($row['theme_location']=="건대"): ?> selected="selected"<?php endif; ?>> 건대 </option>
    <option <?php if ($row['theme_location']=="광화문"): ?> selected="selected"<?php endif; ?>> 광화문 </option>
    <option <?php if ($row['theme_location']=="삼청동"): ?> selected="selected"<?php endif; ?>> 삼청동 </option>
    <option <?php if ($row['theme_location']=="서촌"): ?> selected="selected"<?php endif; ?>> 서촌 </option>
    <option <?php if ($row['theme_location']=="잠실"): ?> selected="selected"<?php endif; ?>> 잠실 </option>
    <option <?php if ($row['theme_location']=="사당"): ?> selected="selected"<?php endif; ?>> 사당 </option>
    <option <?php if ($row['theme_location']=="상수"): ?> selected="selected"<?php endif; ?>> 상수 </option>
    <option <?php if ($row['theme_location']=="왕십리"): ?> selected="selected"<?php endif; ?>> 왕십리 </option>
    <option <?php if ($row['theme_location']=="성신여대"): ?> selected="selected"<?php endif; ?>> 성신여대 </option>
       <option <?php if ($row['theme_location']=="강북"): ?> selected="selected"<?php endif; ?>> 강북 </option>
   </select>    
  </div>
  <div class="w3-container w3-white">
   <select name="theme_mood">
   <option value=" "> 테마 : 분위기 </option>
   <option <?php if ($row['theme_mood']=="조용하고 아늑한"): ?> selected="selected"<?php endif; ?>>조용하고 아늑한</option>
    <option <?php if ($row['theme_mood']=="루프탑 파티"): ?> selected="selected"<?php endif; ?>>루프탑 파티</option>
    <option <?php if ($row['theme_mood']=="가족 모임"): ?> selected="selected"<?php endif; ?>>가족 모임</option>
    <option <?php if ($row['theme_mood']=="가성비 좋은"): ?> selected="selected"<?php endif; ?>>가성비 좋은</option>
    <option <?php if ($row['theme_mood']=="젊고 캐주얼한"): ?> selected="selected"<?php endif; ?>>젊고 캐주얼한</option>          
   </select>
  </div>
  <div class="w3-container w3-white">
  <select name="theme_food">
    <option value=" "> 테마 : 메뉴 </option>
    <option <?php if ($row['theme_food']=="한식"): ?> selected="selected"<?php endif; ?> > 한식 </option>
    <option <?php if ($row['theme_food']=="중식"): ?> selected="selected"<?php endif; ?> > 중식 </option>
    <option <?php if ($row['theme_food']=="일식"): ?> selected="selected"<?php endif; ?> > 일식 </option>
    <option <?php if ($row['theme_food']=="양식"): ?> selected="selected"<?php endif; ?> > 양식 </option>
    <option <?php if ($row['theme_food']=="양식"): ?> selected="selected"<?php endif; ?> > 퓨전 </option>

  </select>
  </div>
<p></p>
  <div class="w3-container w3-white">
   <label>식당 공지사항</label>
   <input type=text name=rest_message class="w3-input w3-border" placeholder="공지사항를 입력해주세요">
  </div>
  <div class="w3-container w3-white">
   <input type=submit class="w3-button w3-red w3-margin-top" value='회원가입'>
  </div>
 </div>
</div>
</body>
</form>