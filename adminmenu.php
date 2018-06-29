<?php
/*  $var=0;
  if($_GET['userverwaltung']=="Nutzerverwaltung")
  {
    if(!$link=mysqli_connect("127.0.0.1","root",""))
  	{
  		echo "Verbindungsaufbau gescheitert.";
  	}
  	else
  	{
      $var=1;
    }
  }

  if($_GET['filmeverwaltung']=="Filmeverwaltung")
  {
    if(!$link=mysqli_connect("127.0.0.1","root",""))
  	{
  		echo "Verbindungsaufbau gescheitert.";
  	}
  	else
  	{
      $var=2;
    }
  }

 */ ?>

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
        <form action="">
          <button type="submit" name="logout" value="logout">Ausloggen</button>
        </form>
    </div>
  </body>
</html>

aaaaaaaaa
