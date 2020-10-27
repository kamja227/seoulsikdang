<script>
function chk_frm(){
	
	if(!document.register1.rest_id.value) {
	window.alert('식당명을 입력해 주세요');
	document.register1.rest_id.focus();
	return false;
	}
}




<form action="rest_register_adj.php" method="post" onsubmit="return chk_frm()" name="register1">


<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="w3.css">
<script type="text/javascript">
</script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family:"Raleway",Arial,Helvetica,sans-serif}
.myLink {display: none}
</style>

<title> 식당 등록하기 </title>
<body>
<div class="w3-row-padding">
<div class="w3-half w3-margin-bottom">
<div class="w3-container w3-white">
	<h3> 식당 등록하기 </h3>

	<label> 식당명 </label>
	<input type=text name=rest_name class="w3-input w3-border" placeholder="식당명을 입력해주세요">

	<label> 연락처 </label>
	<input type=text name=rest_tel class="w3-input w3-border" placeholder="연락처를 입력해주세요">

	<label> 주소 </label>
	<input type=text name=rest_address class="w3-input w3-border" placeholder="주소를 입력해주세요">

	<label> 테마 카테고리 지정</label>
	</div>
   <div class="w3-container w3-white">
	<select name="rest_theme_location">
	<option value=" "> 테마 : 동네 </option>
	<option  <?php if(isset($rest_theme_location)&& $rest_theme_location=="홍대") echo "selected"?> value="홍대" /> 홍대 </option>
	<option  <?php if(isset($rest_theme_location)&& $rest_theme_location=="이태원") echo "selected"?> value="이태원" /> 이태원 </option>
	<option  <?php if(isset($rest_theme_location)&& $rest_theme_location=="망원") echo "selected"?> value="망원" /> 망원 </option>
	</select>

	<select name="rest_theme_mood">
	<option value=" "> 테마 : 분위기 </option>
	<option  <?php if(isset($rest_theme_mood)&& $rest_theme_mood=="조용하고 아늑한") echo "selected"?> value="조용하고 아늑한" /> 조용하고 아늑한 </option>
	<option  <?php if(isset($rest_theme_mood)&& $rest_theme_mood=="루프탑 파티") echo "selected"?> value="루프탑 파티" /> 루프탑 파티 </option>
	<option  <?php if(isset($rest_theme_mood)&& $rest_theme_mood=="가족 모임") echo "selected"?> value="가족 모임" /> 가족 모임 </option>
	</select>

	<select name="rest_theme_food">
	<option value=" "> 테마 : 메뉴 </option>
	<option  <?php if(isset($rest_theme_food)&& $rest_theme_food=="한식") echo "selected"?> value="한식" /> 한식 </option>
	<option  <?php if(isset($rest_theme_food)&& $rest_theme_food=="중식") echo "selected"?> value="중식" /> 중식 </option>
	<option  <?php if(isset($rest_theme_food)&& $rest_theme_food=="일식") echo "selected"?> value="일식" /> 일식 </option>
	<option  <?php if(isset($rest_theme_food)&& $rest_theme_food=="양식") echo "selected"?> value="양식" /> 양식 </option>
	</select>

	<label> 예약 가능 날짜 지정</label> // 추후 수정
	<input type=text name=rest_resr_date class="w3-input w3-border" placeholder="예약 가능 날짜를 입력해주세요">
	<label> 예약 가능 시간대 지정 지정</label> // 추후 수정
	<input type=text name=rest_opentime class="w3-input w3-border" placeholder="예약 가능 시간대를 입력해주세요">
	<label> 예약 가능 최대 인원 선택 </label> //추후 수정
	<input type=text name=rest_max class="w3-input w3-border" placeholder="예약 가능 최대 인원을 입력해주세요">

	<label> 예약 허용 범위 </label>
	</div>
   <div class="w3-container w3-white">
  <input type="radio" name="rest_allowance" <?php if(isset($rest_allowance)&& $rest_allowance=="브론즈") echo "checked"?> value="브론즈" />브론즈
  <input type="radio" name="rest_allowance" <?php if(isset($rest_allowance)&& $rest_allowance=="실버") echo "checked"?> value="실버" />실버
  <input type="radio" name="rest_allowance" <?php if(isset($rest_allowance)&& $rest_allowance=="골드") echo "checked"?> value="골드" />골드
  </div>
  </div>
  </div>
  </body>
  </form>

