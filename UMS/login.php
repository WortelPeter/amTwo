
	<?php 
		
		$username = $_POST['emailaddress'];
		$password = md5($_POST['password']);
		$query = "SELECT * FROM users WHERE emailaddres = '".$username."' AND Password = '".$password."'";
		$users = mysql_query($query) or die("MySQL error: ".mysql_error());
		if(mysql_num_rows($users) == 1){
	        
			$_SESSION['username'] = $username;
			$_SESSION['LoggedIn'] = 1;
			$_SESSION['userid'] = mysql_fetch_array($users);
			$ipaddress = get_client_ip();
			$key = gen_rand_string();
			$expire = 1 * 3600;
			setcookie("LoginKEY",$key);
			$query = "UPDATE users SET LoginIP='".$ipaddress."', KeyString='".$key."' WHERE EmailAddres='".$_SESSION['username']."'";
			mysql_query($query) or die("MySQL error: ".mysql_error());
			
			echo "<meta http-equiv='refresh' content='0;url=/amtwo/?mes=loginsucces'>";
			
		}
		else{
			//echo "Login Failed, please try again...<br>";
			echo "<meta http-equiv='refresh' content='0;url=/amtwo/?mes=loginfailed'>";
		}
	?>
