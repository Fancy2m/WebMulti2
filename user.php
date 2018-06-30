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
            $abfrage="SELECT ratingID COUNT(*) FROM rating AS AnzahlRatings WHERE user_rid = '1' ";
      			$ergebnis=mysqli_query($link,$abfrage);
      			$row=mysqli_fetch_array($ergebnis);
            echo "Willkommen,"; echo $_SESSION['nutzervorname'] ."</br>";
            echo "Du hast bereits". $ergebnis . "Ratings geschrieben!";
            echo $_SESSION['userID'];
            //So und so viele Beiträge verfasst
          }

        elseif ($wert==2)
          {
            // Meine Daten ändern und Kontozeugs
          }
        elseif ($wert==3)
          {
            // Meine Bewertungen ansehen und bearbeiten
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
