<?php
session_start();
if($_POST['logout']=="logout")
{
  session_destroy();
  echo"<html><body><meta  http-equiv=REFRESH CONTENT=1; url=login.php></body></html>";
}?>

<html>
  <head>
  </head>
  <body>
    <div class=adminmenu>
      <!--<form action="adminmenu.php" method="GET"> -->
        <button onClick="window.location.href='adminpanel.php?var=1'">Nutzerverwaltung</button>
      <!--</form> -->
      <!-- <form action="adminmenu.php" method="GET"> -->
        <button onClick="window.location.href='adminpanel.php?var=2'">Filmeverwaltung</button>
      <!-- </form> -->
        <button onClick="window.location.href='adminpanel.php?var=3'">Director-Verwaltung</button>
        <button onClick="window.location.href='adminpanel.php?var=4'">Rating-Verwaltung</button>
        <form action="adminmenu.php" method="POST">
          <button type="submit" name="logout" value="logout">Ausloggen</button>
        </form>
    </div>
  </body>
</html>
