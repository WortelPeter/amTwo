<?php  //error_reporting(E_ALL);
//ini_set('display_errors',true);?>

<?php include "UMS/base.php"; ?>
<?php include "System/functions.php"; ?>


<html>
<head>
	<title>amTwo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>

	<?php 
	// header
	include "css/standardheader.php";
	include "System/messagebar.php";
	include "System/handling.php";
 	
	//User wants to log out.
	if($_GET['instr']=='logout'){
		include 'UMS/logout.php';
	}
	
	// User is logged in, show main page
	elseif(!empty($_SESSION['LoggedIn'])){
		include 'System/loggedin.php';
	}
    
	// User wants to register
	elseif($_GET['instr']=='register'){
		require 'UMS/register.php';
	}

	// If user is not logged in, show the loginform's
	else{
		include 'UMS/loginform.php';
	}; 
	
	// copieright footer
	include "css/standardfooter.html";

	include "docs/documentation.php";

	?>
	<script type="text/javascript">
		history.pushState("", document.title, window.location.pathname);
	</script>
</body>
</html>
