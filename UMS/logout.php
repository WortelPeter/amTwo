<html>
<body>

<?php 
	include "UMS/base.php"; 
	
	session_destroy(); 
	echo setcookie("AccountMng", "",time()-3600);
	$query = "UPDATE users SET LoginIP='',KeyString='' WHERE EmailAddres='".$_SESSION['username']."'";
	mysql_query($query) or die("MySQL error: ".mysql_error());
	$_SESSION = array();
	echo "<meta http-equiv='refresh' content='0;/AM2'>";
?>
</body>
</html>
