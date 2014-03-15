<?php

//error_reporting(E_ALL);
//ini_set('display_errors','1');
if($_GET['check']==1){
	$email = $_POST['email'];
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];
	

	$err = false;
	$errcolor = 'red';
	$bgpass2 = $bgpass1 = $bgemail = $bgtel = $bguser = 'white';
	if($pass1 != $pass2){
		$bgpass2 = $errcolor;
		$err = true;
	}	
	if(strlen($pass1) < 1){
		$bgpass1 = $errcolor;
		$err = true;	
	}
	$domain = strstr($email,"@");
	if($domain === false || strstr($domain,".") === false){
		$bgemail = $errcolor;
		$err = true;
	}

	$query = "SELECT * FROM users WHERE EmailAddres = '".$email."'";
	$users = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($users) != 0){
		$bgemail = $errcolor;
		$err = true;
	}

	$query = "SELECT * FROM regusers WHERE Email = '".$email."'";
	$regusers = mysql_query($query);
	
	if(mysql_num_rows($regusers) != 0){
	  $bgemail = $errcolor;
	  $err = true;
	}
	
	
	if(!$err){
                $query = "SELECT `Key` FROM `reguser`";
		$keys = mysql_query($query);
		$keyslist = array();
		while($row = mysql_fetch_array($keys)){
		  $keyslist[] = $row[0];
		}
		$key = gen_rand_string($length = 10);
		while(in_array($key,$keyslist)){
		  $key = gen_rand_string($length = 10);
		} 

		$query = "INSERT INTO `regusers`(`EmailAddres`, `Password`, `Key`) VALUES ('".$email."','".md5($pass1)."','".$key."')";
		mysql_query($query) or die(mysql_error());
 		mail($email,'amTwo - registration','95.211.48.13/AM2/UMS/checkmail.php?key='.$key,'From: no-reply@amTwo.com');
	    	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}

}

?>
<center>
<div class='title' style='margin-top:-20px;'>Register</div>
<div class='lineundertitle'></div><br>
<form method='post' action='index.php?instr=register&check=1'>
<table class='nospacing' style='margin-left:3px;'>
	<tr bgcolor=<?php echo $bgemail;?>>
		<td class='leftround'><b>Email-address:</b> </td>
		<td class='rightround'><input type='text' name='email'></td>
		<td bgcolor='white'></td>
		<td bgcolor='white'>?</td>
	</tr>
	<tr><td></td></tr>
	<tr bgcolor= <?php echo $bgpass1; ?>>
		<td class='leftround'><b>Password:</b> </td>
		<td class='rightround'><input type='password' name='password1'></td>
		<td bgcolor='white'></td>
		<td bgcolor='white'>?</td>
	</tr>
	<tr><td></td></tr>
	<tr bgcolor= <?php echo $bgpass2; ?>>
		<td class='leftround'><b>Repeat Password:</b> </td>
		<td class='rightround'><input type='password' name='password2'></td>
		<td bgcolor='white'></td>
		<td bgcolor='white'>?</td>
	</tr>
	<tr><td></td></tr>
	
</table>
<input type='button' class='button' value='home' onclick='location.href="/AM2/index.php"'></button><input class='button' value='submit' type='submit'>
</form>	
</center>
