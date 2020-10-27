<form action = "reservation_post.php" method = "post" name = "reserve">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="w3.css">
 <script type="text/javascript">
 </script>
 <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
  .myLink {display: none}
 </style>
 <title> 예약 </title>
 <body>
<!-- restaurant introduce -->
   <div class="w3-row-padding">
   <div class="w3-half w3-margin-bottom">
   <img src="" alt="" style="width:100%">
   <div class="w3-container w3-white">
   <h3>식당 이름</h3>
   <label>Date</label>
   <input class="w3-input w3-border" type="text" placeholder="YYYY-MM-DD">
   <label>Time</label>
   <input class="w3-input w3-border" type="text" placeholder="예약시간">
   <label>people</label>
   <input class="w3-input w3-border" type="text" placeholder="예약인원">
   </div>
   <div class="w3-container w3-white">
   <label>이름</label>
   <input class="w3-input w3-border" type="text" placeholder="Name">
   <label>연락처</label>
   <input class="w3-input w3-border" type="text" placeholder="###-####-####">
   <label>E-mail</label>
   <input class="w3-input w3-border" type="text" placeholder="Your Email address">
   <label>요청사항</label>
   <input class="w3-input w3-border" type="text" placeholder="간단하게 적어주세요.">
   </div>
   <div class="w3-container w3-white">
   <label>식당 개별공지</label>
   </div>
   <div class="w3-container w3-white">
      <button type="button" class="w3-button w3-red w3-margin-top">예약 하기</button>
   </div>
</div>
</div>
</body>
