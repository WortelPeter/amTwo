
<?php

require 'UMS/base.php';
if($_GET['step']==1){
	$query = "SELECT `UserID` FROM `users` WHERE `KeyString` = '".$_COOKIE['LoginKEY']."'";	
	$userid = mysql_fetch_array(mysql_query($query)) or die(mysql_error());
	$expire = time() + 300;
	$query = "INSERT INTO `coupling` (`UserID`, `Key`, `ValidUntil`) VALUES(".$userid[0].",'".$_GET['key']."',".$expire.")";
	mysql_query($query) or die(mysql_error());
}
elseif($_GET['step']==2){
	$query = "SELECT * FROM `coupling` WHERE `Key` = '".$_GET['key']."'";
	$coupling = mysql_fetch_array(mysql_query($query));
 	if(time() < $coupling[3]){
		echo "user: ".$coupling[1];
	}
}


?>

