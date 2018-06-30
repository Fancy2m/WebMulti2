<?php
session_start();
 if ($_SESSION['login']==1) {

   if ($_SESSION['gruppe']==2) {
   echo '<div class=adminmenu>
   <!--<form action="adminmenu.php" method="GET"> -->
   <button onClick="window.location.href="adminpanel.php?var=1"">Nutzerverwaltung</button>
   <!--</form> -->
   <!-- <form action="adminmenu.php" method="GET"> -->
   <button onClick="window.location.href="adminpanel.php?var=2"">Filmeverwaltung</button>
   <!-- </form> -->
   <button onClick="window.location.href="adminpanel.php?var=3"">Director-Verwaltung</button>
   <button onClick="window.location.href="adminpanel.php?var=4"">Rating-Verwaltung</button>
   <form action="login.php" method="POST">
   <button type="submit" name="lgbutton" value="Logout">Ausloggen</button>
   </form>
   </div>';
    }
  }
  else {
    echo "NEIN!";
  }
?>
<html>
  <link rel="stylesheet" href="layout.css">
  <head>
  </head>
  <body>
  </body>
</html>
