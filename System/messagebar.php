	<?php
	  $messagearray = array('loginfailed' => 'Login failed, try again', 'loginsucces' => 'Login succes','logout'=>'Logout succesfull','mailsend'=>'Confirmation mail send');
	  $message = $messagearray[$_GET['mes']];

	  echo '<div id="messagebarwrap"><div id="messagebarpoint"></div><div id="messagebar">'.$message.'</div></div>';
	  if(gettype($message) != 'NULL'){
        echo "<script type='text/javascript'>";
        echo "$(document).ready(function(){";
 		echo "$('#messagebar').delay(0).fadeIn('slow').delay(3000).fadeOut('slow')";
        echo '})</script>';
      }

    ?>