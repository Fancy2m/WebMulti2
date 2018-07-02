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
    <?php

    error_reporting(0);
    include "usermenu.php"
    ?>
    </div>
  </body>
</html>
