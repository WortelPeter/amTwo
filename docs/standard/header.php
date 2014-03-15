<div id="header"><center>
<?php
  if(!$_SESSION['LoggedIn']){
    $link1 = '<a class="menuitem" href="#">about</a>';
    $link2 = '<a class="menuitem" href="#">privacy</a>';
    $link3 = '<a class="menuitem" href="#">security</a>';
    $link4 = '<a class="menuitem" href="#">developers</a>';
    $link5 = '<a class="menuitem" href="#">help</a>';
    echo $link1.'&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp'.$link2.'&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp'.$link3.'&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp'.$link4.'&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp'.$link5;




    echo $var; 
  }else{
    echo '<form method="POST" action="">Email:<input type="text" name="username"> Password:&nbsp<input type="password" name="password"><input type="submit">';
  }


?>
</center></div>
