<html>
  <head>
  </head>
  <body>
    <div class=usermenu>
      <!--<form action="adminmenu.php" method="GET"> -->
        <button onClick="window.location.href='user.php?var=1'">Profil</button>
      <!--</form> -->
      <!-- <form action="adminmenu.php" method="GET"> -->
        <button onClick="window.location.href='user.php?var=2'">Mein Konto</button>
      <!-- </form> -->
        <button onClick="window.location.href='user.php?var=3'">Meine Bewertungen</button>
        <!--<button onClick="window.location.href='user.php?var=4'"></button>-->
        <form action="login.php" method="POST">
          <button type="submit" name="lgbutton" value="Logout">Ausloggen</button>
        </form>
    </div>
  </body>
</html>
