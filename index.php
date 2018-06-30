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
  switch ($_SESSION['gruppe']) {
      case '1':
        include "usermenu.php";
        break;
      case '2';
        include "adminmenu.php";
        break;
      default:
        echo '
        <a class="login" href="/webmulti2/loginpage.php">Login</a>
        <a class="login" href="/webmulti2/registerpage.php">Registrieren</a>';
      break;
  }
  ?>
  <div class="menu">
    <?php
    	include "searchtest1.php";

  ?>
</div>
</body>
