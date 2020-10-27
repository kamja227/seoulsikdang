<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
   <title></title>
</head>
<body>

<?php
session_start();
if($_SESSION['user_id']!=null){
session_destroy();
echo "<script>parent.frames['home_menu'].location.reload(true);</script>";
echo "<script>location.replace='login.php';</script>";
}

else if($_SESSION['rest_id']!=null){
session_destroy();
echo "<script>parent.frames['home_menu'].location.reload(true);</script>";
echo "<script>location.replace='rest_login.php';</script>";
}

?>

</body>
</html>
