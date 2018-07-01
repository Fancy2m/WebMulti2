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
        include "usermenu.php";
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
            //So und so viele Beiträge verfasst
          }

        elseif ($wert==2)
          {
            // Meine Daten ändern und Kontozeugs


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
              echo "<td>" . $row['commnt'] . "></td>";
              echo "<td>" . $row['wert'] . "</td>";
              echo "<td>" . $row['datum'] . "></td>";
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
