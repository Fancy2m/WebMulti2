<html>
<link rel="stylesheet" href="layout.css">
  <head>
  </head>
  <body>
    <div class=usermenu>
    <button onClick="window.location.href='user.php?var=1'">Profil</button>
      <button onClick='window.location.href="user.php?var=2"'>Mein Konto</button>
      <button onClick='window.location.href="user.php?var=3"'>Meine Bewertungen</button>
      <form action='loginpage.php' method='POST'>
        <button type='submit' name='lgbutton' value='Logout'>Ausloggen</button>
      </form>
      </div>
  </body>
</html>
