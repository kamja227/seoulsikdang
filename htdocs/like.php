<?php
session_start();

echo "
<html>
<head>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel='stylesheet' href='w3.css'>
</head>
<body>

<h4 class='w3-border-bottom w3-border-light-grey w3-padding-16'>좋아요 내역</h4>
";


     $conn = mysql_connect('localhost','root','950227');
     $db_status = mysql_select_db('reservation2',$conn);
     if (!$db_status)
     {
       echo("DB_ERROR");
       exit;
     }

     $query = mysql_query("SELECT like_user_no, like_rest_no FROM like_table WHERE like_user_no = '" .$_SESSION['user_no']. "'") or die(mysql_error());
     
     while($rows = mysql_fetch_array($query)){

        $user_no = $rows["like_user_no"];
        $rest_no = $rows["like_rest_no"];

        $query1 = mysql_query("SELECT rest_name, rest_opentime, rest_mainmenu FROM restaurant_table WHERE rest_no = '" .$rest_no. "'") or die(mysql_error());
    
     while ($rows = mysql_fetch_array($query1)) {
       $rest_name = $rows["rest_name"];
       $rest_opentime = $rows["rest_opentime"];
       $rest_mainmenu = $rows["rest_mainmenu"];
   }



       echo "<div class='w3-quarter w3-container w3-margin-bottom'>";
       echo "<img src='/images/$rest_no.jpg' width='300px' height='200px' class='w3-hover-opacity'>";
       echo "<div class='w3-container w3-white'>";       
       echo "<h3><a href='rest_detail.php?rest_no=" .$rest_no. "'>" .$rest_name. "</a></h3>";
       echo "<h5 class='w3-opactity'>" . $rest_opentime . "</h5>";
       echo "<h5 class='w3-opacity'>" . $rest_mainmenu . "</h5>";
       echo "<a href='like_delete.php?rest_no=" .$rest_no. "'> <img src= '/images/like.png' width='30px' height='30px' class='w3-hover-opacity'></a>";
       echo "</div>
            </div>";
      
         
     
        
}

?>