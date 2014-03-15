<?php

if(!empty($_POST['emailaddress']) && !empty($_POST['password'])){
        include $_SERVER['DOCUMENT_ROOT'].'/AM2/UMS/login.php';
}
if(!empty($_POST['grantuser']) && !empty($_POST['grantright'])){
	$grantuser = $_POST['grantuser'];
	$right = $_POST['grantright'];
	$acountid = $_POST['accountid'];
	// check if user exists	
	$query = "SELECT * FROM users WHERE EmailAddres = ".$grantuser;
	$user = mysql_query($query);
	if(mysql_num_rows($user) != 1){
		echo "This user is not using .Theam. ";
		echo "<meta http-equiv='REFRESH' content='1.5 url=".$_SERVER['DOCUMENT_ROOT']."/Account_Mng/index.php'>";
	}
	
	else{
		$user = mysql_fetch_array($users);
		$query = "SELECT * FROM rights_accounts WHERE AccountID = ".$acountid." AND UserID = ".$user[0];
		$query = "INSERT INTO rights_accounts(UserID, AccountID, Right) VALUES(".$user[0].",".$acountid.",".$right.")";
		mysql_query($query);
	}
}






	
?>


