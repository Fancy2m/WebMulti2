<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <?php
      $wert = $_GET['var'];
      session_start();
      if ($_SESSION['login']==1)
      {
        include "usermenu.php";
        if($wert==1)
          {// Meine Daten und Statistiken
            if(!$link=mysqli_connect("127.0.0.1","root",""))
            {
              echo "Verbindungsaufbau gescheitert.";
            }
            else
            {
              $result=mysqli_query($link,"SELECT count (rating_ID)  as total from rating WHERE user_rid = '".$_SESSION["UserID"]."'");
              $data=mysqli_fetch_assoc($result);
              echo $data['total'];
            echo "Willkommen," .$_SESSION["Nutzervorname"];
            echo "Du hast" .$ergebnis. " Ratings geschrieben!";
          }
        }
        elseif ($wert==2)
          {

          }
        elseif ($wert==3)
          {
            // Meine Bewertungen ansehen und bearbeiten
          }

          //elseif ($wert==4)
          //{

          //}
      }
    else
    {
      echo "Sie haben nicht die Berechtigung dazu!";
    }

?>

  </body>
</html>
