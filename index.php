<?php
session_start();
 ?>
<html>
<link rel="stylesheet" href="layout.css">
<link rel="stylesheet" href="index.css">
<head>

</head>
<body>
  <h1> <a href="/webmulti2/index.php">Film DB</a></h1>
  <?php
<<<<<<< HEAD
=======
include "searchtest1.php";

>>>>>>> e98305c4b2dbf14a1c69792fc0b04d2ad1850a01
  switch ($_SESSION['gruppe']) {
    case '1':
      include "usermenu.php";
      break;
    case '2';
      include "adminmenu.php";
<<<<<<< HEAD
=======
      break;
>>>>>>> e98305c4b2dbf14a1c69792fc0b04d2ad1850a01
    default:
    echo '
      <a class="login" href="/webmulti2/loginpage.php">Login</a>
      <a class="login" href="/webmulti2/registerpage.php">Registrieren</a>';
      break;
  }
<<<<<<< HEAD
=======

>>>>>>> e98305c4b2dbf14a1c69792fc0b04d2ad1850a01
  ?>
</body>
