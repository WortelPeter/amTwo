<?php // error_reporting(E_ALL);
//ini_set('display_errors',true);?>

<?php include "UMS/base.php"; ?>
<?php include "System/functions.php"; ?>


<html>
<head>
	<title>amTwo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="jquery-1.10.2.min.js"></script>
</head>
<body>

	<?php 
	// header
	include $_SERVER['DOCUMENT_ROOT']."/AM2/css/standardheader.php";
	include $_SERVER['DOCUMENT_ROOT']."/AM2/System/handling.php";	
	
	
	//User wants to log out.
	if($_GET['instr']=='logout'){
		include $_SERVER['DOCUMENT_ROOT'].'/AM2/UMS/logout.php';
	}
	
	// User is logged in, show main page
	elseif(!empty($_SESSION['LoggedIn'])){
		include $_SERVER['DOCUMENT_ROOT'].'/AM2/System/loggedin.php';
	}

	// User wants to register
	elseif($_GET['instr']=='register'){
		require $_SERVER['DOCUMENT_ROOT'].'/AM2/UMS/register.php';
	}

	// If user is not logged in, show the loginform's
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/AM2/UMS/loginform.php';
	}; 
	
	// copieright footer
	include $_SERVER['DOCUMENT_ROOT']."/AM2/css/standardfooter.html";
	?>
	
</body>
</html>
