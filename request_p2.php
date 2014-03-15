<?php
	$cookie = $_COOKIE['LoginKEY'];
        $query = "SELECT * FROM `users` WHERE `KeyString` = '".$cookie."'";
	echo $user = mysql_num_rows(mysql_query($query));
	echo $userid = $user[0];
	echo "eta http-equiv='REFRESH' content='0; url=".$_GET['url']."?userid=".$userid."'>";

?>
