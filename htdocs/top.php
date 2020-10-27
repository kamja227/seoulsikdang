<?php 
session_start();

#로그인 된 경우
if($_SESSION['user_id'])
{
 echo ("
   <html>
   <head>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='w3.css'>
   <style>
   .window {
      display: inline-block;
      width: 366px; height: 34px;
      border: 3px solid #FFA62E;
      background: white;
   }
   .input_text {
      width: 348px; height: 21px;
      margin: 6px 0 0 9px;
      border: 0;
      line-height: 21px;
      font-weight: bold;
      font-size: 16px;
      outline: none;
   }
   .sch_smit {
      width: 54px; height: 40px;
      margin: 0; border: 0;
      vertical-align: top;
      background: #FFA62E;
      color: white;
      font-weight: bold;
      border-radius: 1px;
      cursor: pointer;
   }
   .sch_smit:hover {
      background: #FFC900;
   }
   </style>
   <title></title>
   </head>
   <body scroll='no'>
   <header class='w3-panel w3-center w3-opacity'>
     <h1><img src= '/images/restaurant.png' width='30px' height='40x' class='w3-hover-opacity'>&nbsp; 서울식당</h1>
     <p>믿을 수 있는 예약 서비스</p>
   </div>
   <div class='w3-bar w3-border'>
       <a href='logout.php' target='home_main' class='w3-bar-item w3-button'>logout</a>
       <a href='rest_list.php' target='home_main' class='w3-bar-item w3-button'>main</a>
      <a href='mypage.php' target='home_main' class='w3-bar-item w3-button'>mypage</a>
       <a href='like.php' target='home_main' class='w3-bar-item w3-button'>like</a>
   </div>
    </header>
    </body>
    </html>
   ");
}
#식당회원 로그인한 경우
elseif($_SESSION['rest_id'])
{
echo ("
   <html>
   <head>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <link rel='stylesheet' href='w3.css'>
   <style>
   .window {
      display: inline-block;
      width: 366px; height: 34px;
      border: 3px solid #FFA62E;
      background: white;
   }
   .input_text {
      width: 348px; height: 21px;
      margin: 6px 0 0 9px;
      border: 0;
      line-height: 21px;
      font-weight: bold;
      font-size: 16px;
      outline: none;
   }
   .sch_smit {
      width: 54px; height: 40px;
      margin: 0; border: 0;
      vertical-align: top;
      background: #FFA62E;
      color: white;
      font-weight: bold;
      border-radius: 1px;
      cursor: pointer;
   }
   .sch_smit:hover {
      background: #FFC900;
   }
   </style>
   <title></title>
   </head>
   <body scroll='no'>
   <header class='w3-panel w3-center w3-opacity'>
     <h1> <img src= '/images/restaurant.png' width='30px' height='40x' class='w3-hover-opacity'>&nbsp; 서울식당</h1>
     <p>믿을 수 있는 예약 서비스</p>
   </div>
   <div class='w3-bar w3-border'>
       <a href='logout.php' target='home_main' class='w3-bar-item w3-button'>logout</a>
       <a href='rest_list.php' target='home_main' class='w3-bar-item w3-button'>main</a>
      <a href='admin.php' target='home_main' class='w3-bar-item w3-button'>my restaurant</a>
   </div>
   </header>
   </body>
   </html>
   ");
}
#로그인 되지 않은 경우
else
{
   echo("
      <html>
      <head>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='w3.css'>
      <style>
   .window {
      display: inline-block;
      width: 366px; height: 34px;
      border: 3px solid #FFA62E;
      background: white;
   }
   .input_text {
      width: 348px; height: 21px;
      margin: 6px 0 0 9px;
      border: 0;
      line-height: 21px;
      font-weight: bold;
      font-size: 16px;
      outline: none;
   }
   .sch_smit {
      width: 54px; height: 40px;
      margin: 0; border: 0;
      vertical-align: top;
      background: #FFA62E;
      color: white;
      font-weight: bold;
      border-radius: 1px;
      cursor: pointer;
   }
   .sch_smit:hover {
      background: #FFC900;
   }
   </style>
      <title></title>
      </head>
      <body scroll='no'>
      <header class='w3-panel w3-center w3-opacity'>
        <h1> <img src= '/images/restaurant.png' width='30px' height='40x' class='w3-hover-opacity'>&nbsp;서울식당</h1>
        <p>믿을 수 있는 예약 서비스</p>
      </div>
       <div class='w3-bar w3-border'>
         <a href='login_segment.php' target='home_main' class='w3-bar-item w3-button'>login</a>
         <a href='rest_list.php' target='home_main' class='w3-bar-item w3-button'>main</a>
      </div>
      </header>
      </body>
      </html>
      ");
}
echo "
<form style = 'text-align : center' class='form-inline' action='search.php' method='post' name='search' target='home_main'>
<select class='input_select form-control' name='search_sort'>
<option value='식당명'>식당명</option>
<option value='주소'>주소</option>
<option value='메인메뉴'>메인메뉴</option>
<option value='테마동네'>테마 : 동네</option>
<option value='테마메뉴'>테마 : 메뉴</option>
</select>
<span class='window'>
       <input type='text' class='input_text form-control' name='search_value'>
       </span>
        <button type='submit' class='sch_smit btn btn-danger'>검색</button>
</form></header></body></html>";

?>