<?php
session_start();
 ?>
<html>
<link rel="stylesheet" href="layout.css">
<link rel="stylesheet" href="index.css">
<head>

</head>
<body>

  <h1> <a href="/WebMulti2/index.php">Film DB</a></h1>
  <div class="menu">
    <?php
      include "searchtest1.php";

  ?>
</div>
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
        <a class="login" href="/WebMulti2/loginpage.php">Login</a>
        <a class="login" href="/WebMulti2/registerpage.php">Registrieren</a>';
      break;
  }
  ?>

</body>
