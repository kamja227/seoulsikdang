<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset='UTF-8'/>
   <meta charset='UTF-8'/>
<link rel="stylesheet" href="w3.css">
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

 <style>
 a:link {
  text-decoration : none;
}
a:hover{
  background-color: lightgrey;
}
 </style>

</head>
<body>
<div class='w3-row-padding'>


<?php 

session_start();
$search_sort=$_POST['search_sort'];
  $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }

$search_value = $_POST["search_value"];

if($search_sort=="식당명"){
$result =mysql_query("SELECT rest_no, rest_name, rest_opentime, rest_mainmenu FROM restaurant_table WHERE rest_name LIKE '%" .$search_value."%'") or die(mysql_error());
}
else if($search_sort=="주소"){
$result =mysql_query("SELECT rest_no, rest_name, rest_opentime, rest_mainmenu FROM restaurant_table WHERE rest_address LIKE '%" . $search_value. "%'") or die(mysql_error());
}
else if($search_sort=="메인메뉴"){
$result=mysql_query("SELECT rest_no, rest_name, rest_opentime, rest_mainmenu FROM restaurant_table WHERE rest_mainmenu LIKE '%" .$search_value."%'") or die(mysql_error());
}
else if($search_sort=="테마동네"){
  $query=mysql_query("SELECT theme_rest_no FROM theme_table WHERE theme_location LIKE '%" .$search_value."%'") or die(mysql_error());

}
else if($search_sort=="테마메뉴"){
  $query=mysql_query("SELECT theme_rest_no FROM theme_table WHERE theme_food LIKE '%" .$search_value."%'") or die(mysql_error());

}


if(mysql_num_rows($result)){
       while($rows = mysql_fetch_assoc($result)){
            $rest_no = $rows['rest_no'];
            $rest_name = $rows['rest_name'];
            $rest_opentime = $rows['rest_opentime'];
            $rest_mainmenu=$rows['rest_mainmenu'];
            $ave_rest=0;

      $query_ave= "SELECT rev_taste, rev_price, rev_mood, rev_kindness FROM review_table WHERE rev_rest_no = '" .$rest_no. "'"; 
         $result_ave = mysql_query($query_ave) or die(mysql_error()); 

         if(mysql_num_rows($result_ave)){ 

          while($rows = mysql_fetch_array($result_ave)) {
              $rev_taste = $rows["rev_taste"];
              $rev_price = $rows["rev_price"];
              $rev_mood = $rows["rev_mood"];
              $rev_kindness = $rows["rev_kindness"];
              $ave_rest+=($rev_taste+$rev_price+$rev_mood+$rev_kindness);
            
     }

     $ave_rest = $ave_rest / mysql_num_rows($result_ave);
     $ave_rest = $ave_rest/4;
} 
 


       if(($_SESSION["user_id"]==NULL) && ($_SESSION["rest_id"]==NULL)) {
        echo " <div class'w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_logx.php?rest_no=" .$rest_no. "'>"; 
     }
     else if($_SESSION["rest_id"]!==NULL) {
        echo " <div class='w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_restlog.php?rest_no=" .$rest_no. "'>"; 
     }
     else {
        echo " <div class='w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_logx.php?rest_no=" .$rest_no. "'>"; 
     }


       echo "<img src= '/images/$rest_no.jpg' width='300px' height='200px' class='w3-hover-opacity'>";      
       echo "<p><h3>" .$rest_name. "</h3>
       <input type='text' class='rating rating-loading' value='$ave_rest' name='ave_rest' data-min='0' data-max='5'  data-step='0.5' data-size='xs' readonly></p>";
       echo "<h5 class='w3-opactity'>" . $rest_opentime . "</h5>";
       echo "<h5 class='w3-opacity'>" . $rest_mainmenu . "</h5>";
       echo "</a></div>";
            }
     }

else if(mysql_num_rows($query)){
      while($rows = mysql_fetch_assoc($query)){
            $rest_no = $rows['theme_rest_no'];
            $result=mysql_query("SELECT rest_no, rest_name, rest_opentime, rest_mainmenu FROM restaurant_table WHERE rest_no='". $rest_no. "'") or die(mysql_error());
           if(mysql_num_rows($result)){
           while($rows = mysql_fetch_assoc($result)){
            $rest_no = $rows['rest_no'];
            $rest_name = $rows['rest_name'];
            $rest_opentime = $rows['rest_opentime'];
            $rest_mainmenu=$rows['rest_mainmenu'];
            $ave_rest=0;

         $query_ave= "SELECT rev_taste, rev_price, rev_mood, rev_kindness FROM review_table WHERE rev_rest_no = '" .$rest_no. "'"; 
         $result_ave = mysql_query($query_ave) or die(mysql_error()); 

         if(mysql_num_rows($result_ave)){ 

          while($rows = mysql_fetch_array($result_ave)) {
              $rev_taste = $rows["rev_taste"];
              $rev_price = $rows["rev_price"];
              $rev_mood = $rows["rev_mood"];
              $rev_kindness = $rows["rev_kindness"];
              $ave_rest+=($rev_taste+$rev_price+$rev_mood+$rev_kindness);
            
     }

     $ave_rest = $ave_rest / mysql_num_rows($result_ave);
     $ave_rest = $ave_rest/4;
    }
       if(($_SESSION["user_id"]==NULL) && ($_SESSION["rest_id"]==NULL)) {
        echo " <div class'w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_logx.php?rest_no=" .$rest_no. "'>"; 
     }
     else if($_SESSION["rest_id"]!==NULL) {
        echo " <div class='w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_restlog.php?rest_no=" .$rest_no. "'>"; 
     }
     else {
        echo " <div class='w3-quarter w3-container w3-margin-bottom w3-white'>
       <a href='rest_detail_logx.php?rest_no=" .$rest_no. "'>"; 
     }
     
       echo "<img src= '/images/$rest_no.jpg' width='300px' height='200px' class='w3-hover-opacity'>";      
       echo "<p><h3>" .$rest_name. "</h3>
       <input type='text' class='rating rating-loading' value='$ave_rest' name='ave_rest' data-min='0' data-max='5'  data-step='0.5' data-size='xs' readonly></p>";
       echo "<h5 class='w3-opactity'>" . $rest_opentime . "</h5>";
       echo "<h5 class='w3-opacity'>" . $rest_mainmenu . "</h5>";
       echo "</a></div>";    
  }}
}}

else
  echo "입력하신 검색어 '".$search_value."'에 대한 검색 결과가 없습니다.";

?>

</div>
</body>
</html>