<?php
session_start();
include "index.php";
include "login.php";
if($_POST['lgbutton']=="Logout")
{
  session_destroy();
  echo"<html><body><meta  http-equiv=REFRESH CONTENT=1; url=loginpage.php></body></html>";
}
//if ($_SESSION['gruppe']==2) {
  //include "adminmenu.php";
//}
//elseif ($_SESSION['gruppe']==1)
  //{
    //include "usermenu.php";
  //}
 ?>
