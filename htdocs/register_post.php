<?php

  $rest_name = $_POST["rest_name"];
  $rest_tel = $_POST["rest_tel"];
  $rest_address = $_POST["rest_tel"];
  $theme_location= $_POST["theme_location"];
  $theme_mood = $_POST["theme_mood"];
  $theme_food = $_POST["theme_food"];
  $rest_resr_date = $_POST["rest_resr_date"];
  $rest_opentime = $_POST["rest_opentime"];
  $rest_max = $_POST["rest_max"];
  $rest_allowance = $_POST["rest_allowance"];

$connect = mysql_connect("localhost","root","950227");
 mysql_select_db("mydb");

 
  $query = "insert into restaurant_table(rest_name, rest_tel, rest_address, rest_resr_date, rest_opentime, rest_max, rest_allowance)

    values('$rest_name','$rest_tel','$rest_address','$rest_resr_date','$rest_opentime','$rest_max','$rest_allowance')";
 mysql_query($query, $connect);
 mysql_close($connect);

 $query = "insert into theme_table(theme_location, theme_mood, theme_food)

    values('$theme_location','$theme_mood','$theme_food')";
 mysql_query($query, $connect);
 mysql_close($connect);



  // echo $_POST["rest_no"];

?>

<script>


</script>

