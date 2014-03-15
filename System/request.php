<?php 
	include "../functions.php";
	include "../ums/base.php";
	$userip = $_GET['userip'];
	$userkey = $_GET['userkey'];
	$clientip = get_client_ip();
	
	$query = "SELECT * FROM users WHERE LoginIP = '".$userip."' AND KeyString = '".$userkey."'";
	$users = mysql_query($query) or die("MySQL error: ".mysql_error());
	
	$query = "SELECT ID FROM clients WHERE IP = '".$clientip."'";
	$clientid = mysql_fetch_array(mysql_query($query))[0] or die("MySQL error: ".mysql_error());
	
	if(mysql_num_rows($users) != 1){
		echo "This user is not logged in";
	}
	else{
		$query = "SELECT * FROM accounts WHERE ClientID=".$clientid;
		$accounts = mysql_query($query);
		$accountsstring = '';
		$accountslist = array();
		while($row = mysql_fetch_array($accounts)){
			$accountslist[$row[0]] = $row[2];
			$accountsstring .= $row[0].",";}
		$accountsstring = substr_replace($accountsstring ,"",-1);
		
		$userid = mysql_fetch_array($users)[0];
		$query = "SELECT * FROM `rights_accounts` WHERE `UserID` = ".$userid." AND `AccountID` IN (".$accountsstring.")";
		$rights = mysql_query($query) or die("MySQL error: ".mysql_error());
		while($row = mysql_fetch_array($rights)){
			
			echo $row["3"]." - ".$accountslist[$row[2]]."<br>";
		}
		
		
	}
?>