<?php
session_start();
 ?>
<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <?php
      $wert = $_GET['var'];
      if ($_SESSION['login']==1)
      {
        if(!$link=mysqli_connect("127.0.0.1","root",""))
  		    {
  			echo "Verbindungsaufbau gescheitert.";
  		  }
  		    else
  		      {
        include "index.php";
        if($wert==1)
            {// Meine Daten und Statistiken
            mysqli_set_charset($link,"utf8");
        		$db=mysqli_select_db($link,"webmult");
          //  $abfrage="SELECT rating_ID FROM rating WHERE user_rid='1'" or die(mysqli_error($db));
          $abfrage="SELECT COUNT(*) FROM rating WHERE user_rid='".$_SESSION['userID']."'";
            $ergebnis=mysqli_query($link,$abfrage);
            $row = mysqli_fetch_assoc($ergebnis);
            echo "Willkommen,"; echo $_SESSION['nutzervorname'] ."</br>";
            echo "Du hast bereits". $row['COUNT(*)'] . "Ratings geschrieben!";
            echo "Das sind deine Daten:";
            //So und so viele Beiträge verfasst
          }

        elseif ($wert==2)
        {
          // Meine Bewertungen ansehen und bearbeiten
          mysqli_set_charset($link,"utf8");
          $db=mysqli_select_db($link,"webmult");
        //  $abfrage="SELECT rating_ID FROM rating WHERE user_rid='1'" or die(mysqli_error($db));
        $abfrage="SELECT username, passwort, vorname, nachname, geburtstag, gender, email FROM benutzer WHERE benutzer.user_ID ='".$_SESSION['userID']."'";
          $result=mysqli_query($link,$abfrage);
          echo "Hier sind deine Kontodaten,"; echo $_SESSION['nutzervorname'] ."</br>";
          echo "<table border='1'>
          <tr>
          <th>Benutzername</th>
          <th>Vorname</th>
          <th>Nachname</th>
          <th>Geburtstag</th>
          <th>Geschlecht</th>
          <th>E-Mail</th>
          <th>bearbeiten</th>
          <th>Account löschen</th>
          </tr>";
          while($row = mysqli_fetch_array($result))
          {
            echo "<tr>
            <form action='user.php?var=2' method='POST'>";
            echo "<td><input type='textarea' name='username' value=" . $row['username'] . "></input></td>";
            echo "<td><input type='textarea' name='vorname' value=" . $row['vorname'] . "></input></td>";
            echo "<td><input type='textarea' name='nachname' value=" . $row['nachname'] . "></input></td>";
            echo "<td><input type='textarea' name='geburtstag' value=" . $row['geburtstag'] . "></input></td>";
            echo "<td><input type='textarea' name='gender' value=" . $row['gender'] . "></input></td>";
            echo "<td><input type='textarea' name='email' value=" . $row['email'] . "></input></td>";
            echo '<td><button value="editu" name="edit">bearbeiten!</button></td>';
            echo '<td><form action="user.php" method="POST"><button value="delete" name="delete">Account Löschen!</button></form></td>';
            echo"</form>";
          }
            echo "</tr>";

            if ($_POST['edit']=="editu")
            {
              $update="update benutzer set username='".$_POST['username']."', email='".$_POST['email']."', vorname='".$_POST['vorname']."', nachname='".$_POST['nachname']."', geburtstag='".$_POST['geburtstag']."', gender='".$_POST['gender']."' where user_ID='".$_SESSION['userID']."'";
              mysqli_query($link,$update);
              echo "<tr>
              <form action='user.php' method='POST'>";
              echo "<td><input name='username' value=" . $_POST['username'] . "></input></td>";
              echo "<td><input name='vorname' value=" . $_POST['vorname'] . "></input></td>";
              echo "<td><input name='nachname' value=" . $_POST['nachname'] . "></input></td>";
              echo "<td><input name='geburtstag' value=" . $_POST['geburtstag'] . "></input></td>";
              echo "<td><input name='gender' value=" . $_POST['gender'] . "></input></td>";
              echo "<td><input name='email' value=" . $_POST['email'] . "></input></td>";
              echo '<td><button value="editu" name="edit">bearbeiten!</button></td>';
              echo '<td><form action="user.php?var=1", method="POST"><button value="delete" name="delete">Account Löschen!</button></form></td>';
              echo"</form>";
              echo "</tr>";
              echo "</table>";
              echo $update;
            }





        }

        elseif ($wert==3)
          {
            // Meine Bewertungen ansehen und bearbeiten
            mysqli_set_charset($link,"utf8");
            $db=mysqli_select_db($link,"webmult");
          //  $abfrage="SELECT rating_ID FROM rating WHERE user_rid='1'" or die(mysqli_error($db));
          $abfrage="SELECT film.name, rating.commnt, rating.wert, rating.datum FROM film, rating, benutzer WHERE rating.film_rid = film.film_ID AND rating.user_rid = benutzer.user_ID AND benutzer.user_ID ='".$_SESSION['userID']."'";
            $result=mysqli_query($link,$abfrage);
            echo "Hier sind deine Bewertungen,"; echo $_SESSION['nutzervorname'] ."</br>";
            echo "<table border='1'>
            <tr>
            <th>Filmname</th>
            <th>Kommentar</th>
            <th>Bewertung</th>
            <th>Datum</th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
              echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['commnt'] . "</td>";
              echo "<td>" . $row['wert'] . "</td>";
              echo "<td>" . $row['datum'] . "</td>";
            }
              echo "</tr>";
              echo "</table>";


          }

          //elseif ($wert==4)
          //{

          //}
        else
          {
            echo "Sie haben nicht die Berechtigung dazu!";
          }
      }
    }

?>
  </body>
</html>
