<?php
session_start();
include "index.php";
include "login.php";
if ($_SESSION['gruppe']==2) {
  include "adminmenu.php";
}
;
 ?>
