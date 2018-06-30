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
          {
            // Meine Daten und Statistiken
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
      }
    else
    {
      echo "Sie haben nicht die Berechtigung dazu!";
    }

?>

  </body>
</html>
