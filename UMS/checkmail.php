<?php
  $error = false;
  require($_SERVER['DOCUMENT_ROOT'].'/AM2/UMS/base.php') or $error = true;
  require($_SERVER['DOCUMENT_ADDR'].'/AM2/System/functions.php') or $error = true;

  $key = $_GET['key'];
  
  $query = "SELECT * FROM regusers WHERE `Key` = '".$key."'";
  $user =  mysql_fetch_array(mysql_query($query)) $error = true;

  $query = "INSERT INTO users(EmailAddres,Password,KeyString) VALUES ('$user[1]','$user[2]','$user[3]')";
  mysql_query($query) or $error = true;


  $query = "DELETE FROM regusers WHERE `UserID` = '$user[0]'";
  mysql_query($query) or $error = true;

  if(!$error){
    $key = gen_rand_string();
    setcookie('LoginKey', $key);
    $query = 'UPDATE SET ';

  }




  header('Location:'.$_SERVER['DOCUMENT_ADDR'].'/AM2/index.php')

?>

