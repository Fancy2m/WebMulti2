<?php
session_start();
 ?>
<html>
<link rel="stylesheet" href="layout.css">
<link rel="stylesheet" href="index.css">
<head>

</head>
<body>

  <h1> <a href="/WebMulti2/index.php">FilmBase</a></h1>
  <form class="menu" action="index.php" method="POST">
  <input type="text" name="search">
  <button type="submit" name="suchen" value="Suchen">Suchen</button>

  </form>
  <?php
  switch ($_SESSION['gruppe']) {//Abfrage nach administratoren Rechten
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
  <div class="menu">
    <?php
      include "searchtest1.php";//Filmsuche eingefügt

  ?>
  </div>

</body>
