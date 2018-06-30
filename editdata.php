<?php
include "adminmenu.php";
session_start();
$ID = $_GET['var'];
if($_SESSION["edittoken"]==1)
{
  echo "Hier stehen Userdaten" . $_SESSION["edittoken"];
  if(!$link=mysqli_connect("127.0.0.1","root",""))
  {
    echo "Verbindungsaufbau gescheitert.";
  }
  else
  {
    mysqli_set_charset($link,"utf8");
    $db=mysqli_select_db($link,"webmult");
    $result = mysqli_query($link,"SELECT * FROM benutzer WHERE user_ID='$ID'");

    echo "<table border='1'>
    <tr>
    <th>Nutzer-ID</th>
    <th>Benutzername</th>
    <th>E-Mail Adresse</th>
    <th>Vorname</th>
    <th>Nachname</th>
    <th>Geburtsdatum</th>
    <th>Geschlecht</th>
    <th>Rechte</th>
    <th>Aktivierung</th>
    <th>Speichern</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td><input value=" .$row['user_ID']. "></input></td>";
      echo "<td><input value=" . $row['username'] . "></input></td>";
      echo "<td><input value=" . $row['email'] . "></input></td>";
      echo "<td><input value=" . $row['vorname'] . "></input></td>";
      echo "<td><input value=" . $row['nachname'] . "></input></td>";
      echo "<td><input value=" . $row['geburtstag'] . "></input></td>";
      echo "<td><input value=" . $row['gender'] . "></input></td>";
      echo "<td><input value=" . $row['rechte'] . "></input></td>";
      if ($row['rechte']==0)
        {
          echo '<td><button value="activate" value="activate" name="activate">Aktivieren!</button></td>';
        }

      else
        {
          echo '<td><button value="deactivate" name="deactivate" value="deactivate" type="submit">Deaktivieren!</button></td>';
        }
     echo '<td> <button name="edit"  value="edit" type="submit">Speichern</button> </td>';
     echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
  }
}

elseif($_SESSION["edittoken"]==2)
{
  echo "Hier stehen Filmdaten" . $_SESSION["edittoken"];
  if(!$link=mysqli_connect("127.0.0.1","root",""))
  {
    echo "Verbindungsaufbau gescheitert.";
  }
  else
  {
    mysqli_set_charset($link,"utf8");
    $db=mysqli_select_db($link,"webmult");
    $result = mysqli_query($link,"SELECT * FROM film WHERE film_ID='$ID'");

    echo "<table border='1'>
    <tr>
    <th>Film-ID</th>
    <th>Filmtitel</th>
    <th>Erscheinungsjahr</th>
    <th>Director</th>
    <th>Beschreibung</th>
    <th>Durchschnittsrating</th>
    <th>Altersfreigabe</th>
    <th>Speichern</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td><input value=" .$row['film_ID']. "></input></td>";
      echo "<td><input value=" . $row['name'] . "></input></td>";
      echo "<td><input value=" . $row['erscheinungsjahr'] . "></input></td>";
      echo "<td><input value=" . $row['dvorname'];  echo '&nbsp'; echo $row['dnachname'];
      echo "<td><input value=" . $row['nachname'] . "></input></td>";
      echo "<td><input value=" . $row['beschreibung'] . "></input></td>";
      // WIe Bild ändern??? echo "<td><input value=" . $row['gender'] . "></input></td>";
      echo "<td><input value=" . $row['fsk'] . "></input></td>";
      echo '<td> <button name="edit"  value="edit" type="submit">Speichern</button> </td>';
      echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
  }
}

elseif ($wert==3) {
  echo "Hier stehen Directoren. $wert";
  if(!$link=mysqli_connect("127.0.0.1","root",""))
  {
    echo "Verbindungsaufbau gescheitert.";
  }
  else
  {
    mysqli_set_charset($link,"utf8");
    $db=mysqli_select_db($link,"webmult");
    $result = mysqli_query($link,"SELECT * FROM director WHERE directorid='$ID'");

    echo "<table border='1'>
    <tr>
    <th>Director ID</th>
    <th>Vorname</th>
    <th>Nachname</th>
    <th>Bearbeiten</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td><input value=" . $row['directorid'] . "></input></td>";
      echo "<td><input value=" . $row['dvorname'] . "></input></td>";
      echo "<td><input value=" . $row['dnachname'] . "></input></td>";
      echo '<td><button name="edit"  value="edit" type="submit">Speichern</button> </td>';
}
      echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
  }

  elseif ($wert==4) {
    echo "Hier stehen Ratings $wert";
    if(!$link=mysqli_connect("127.0.0.1","root",""))
    {
      echo "Verbindungsaufbau gescheitert.";
    }
    else
    {
      mysqli_set_charset($link,"utf8");
      $db=mysqli_select_db($link,"webmult");
      $result = mysqli_query($link,"SELECT rating_ID, name, username, commnt, wert
                                    FROM benutzer, rating, film
                                    WHERE benutzer.user_ID LIKE rating.user_rid
                                    AND rating.film_rid LIKE film.film_ID AND rating.rating_ID = '$ID'");

      echo "<table border='1'>
      <tr>
      <th>Rating ID</th>
      <th>Filmtitel</th>
      <th>Autor</th>
      <th>Wertung</th>
      <th>Kommentar</th>
      <th>Bearbeiten</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td><input value=" . $row['rating_ID'] . "></input></td>";
        echo "<td><input value=" . $row['name'] . "></input></td>";
        echo "<td><input value=" . $row['username'] . "></input></td>";
        echo "<td><input value=" . $row['wert'] . "></input></td>";
        echo "<td><input value=" . $row['commnt'] . "></input></td>";
        echo '<td><button name="edit"  value="edit" type="submit">Speichern</button> </td>';
      }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_close($link);
    }
if($_POST['edituser']=="edit")
{
  $_SESSION["edittoken"]="1";
  //echo "<html><body><meta http-equiv=REFRESH CONTENT=1;url=editdata.php?var=1></body></html>";
}

if ($_POST['editfilm']=="edit") {
  $_SESSION["edittoken"]="2";

}

if ($_POST['editdirector']=="edit") {
  $_SESSION["edittoken"]="3";
}

if ($_POST['editrating']=="edit") {
  $_SESSION["edittoken"]="4";
}
?>
