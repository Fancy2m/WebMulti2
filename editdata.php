<html>
<link rel="stylesheet" href="layout.css">
<?php
session_start();
if ($_POST['edituser']=='edit') {
  $_SESSION['edittoken']="1";
}

if ($_POST['editfilm']=='edit') {
  $_SESSION['edittoken']="2";
}

if ($_POST['editdirector']=='edit') {
  $_SESSION['edittoken']="3";
}

if ($_POST['editrating']=='edit') {
  $_SESSION['edittoken']="4";
}


if ($_SESSION['login']==1) {
  if($_SESSION['gruppe']==2) {

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

    echo "<form action='editdata.php' method='POST'>
    <table border='1'>
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
      echo "<td><input type='textarea' name='id' value=" .$row['user_ID']. "></input></td>";
      echo "<td><input type='textarea' name='username' value=" . $row['username'] . "></input></td>";
      echo "<td><input type='textarea' name='email' value=" . $row['email'] . "></input></td>";
      echo "<td><input type='textarea' name='vname' value=" . $row['vorname'] . "></input></td>";
      echo "<td><input type='textarea' name='nname' value=" . $row['nachname'] . "></input></td>";
      echo "<td><input type='textarea' name='bday'value=" . $row['geburtstag'] . "></input></td>";
      echo "<td><input type='textarea' name='gender' value=" . $row['gender'] . "></input></td>";
      echo "<td><input type='textarea' name='rechte' value=" . $row['rechte'] . "></input></td>";
      if ($row['rechte']==0)
        {
          echo '<td><button value="activate" value="activate" name="activate">Aktivieren!</button></td>';
        }

      else
        {
          echo '<td><button name="deactivate" value="deactivate" type="submit">Deaktivieren!</button></td>';
        }

        echo '<td> <button name="edit1"  value="edit" type="submit">Speichern</button></form> </td>';
     echo "</tr>";
    }
    echo "</table>";
    if($_POST['edit1'] == "edit")
    {
      $update="update benutzer set username='".$_POST['username']."', email='".$_POST['email']."', vorname='".$_POST['vname']."', nachname='".$_POST['nname']."', geburtstag='".$_POST['bday']."', gender='".$_POST['gender']."', rechte='".$_POST['rechte']."' where user_id='".$_POST['id']."'";
      echo $ID;
      echo $update;
      mysqli_query($link,$update);
    }

    mysqli_close($link);
  }
}

elseif($_SESSION["edittoken"]==2)
{
  echo "Hier stehen Filmdaten" . $_SESSION["edittoken"] . $ID;
  if(!$link=mysqli_connect("127.0.0.1","root",""))
  {
    echo "Verbindungsaufbau gescheitert.";
  }
  else
  {
    mysqli_set_charset($link,"utf8");
    $db=mysqli_select_db($link,"webmult");
    $result = mysqli_query($link,"SELECT * FROM film, director WHERE director.director_ID LIKE film.director_fid AND film.film_ID='$ID'");

    echo "<table border='1'>
    <tr>
    <th>Film-ID</th>
    <th>Filmtitel</th>
    <th>Erscheinungsjahr</th>
    <th>Directorvorname</th>
    <th>Director Nachname</th>
    <th>Beschreibung</th>
    <th>Durchschnittsrating</th>
    <th>Altersfreigabe</th>
    <th>Speichern</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<form method='POST' action='editdata.php'>";
      echo "<td><input name='filmid' value=" . $row['film_ID'] . "></input></td>";
      echo '<td><textarea name="filmname">'; echo $row['name']; echo '</textarea></td>';
      echo "<td><input name='fjahr' value=" . $row['erscheinungsjahr'] . "></input></td>";
      echo "<td><input name='filmdvname' value=" . $row['dvorname'] . "></input></td>";
      echo "<td><input name='filmdnachn' value=" . $row['dnachname']. "></input></td>";
      echo '<td><textarea class="filmdescr" name="fdescr">'; echo $row['beschreibung']; echo '</textarea></td>';
      echo "<td><input name='frating' value=" . $row['avgrating'] . "></input></td>";
      echo "<td><input name='ffsk' value=" . $row['fsk'] . "></input></td>";
      echo '<td> <button name="edit2" onClick="window.location.href="editdata.php?var="'.$ID.'" value="edit" type="submit" >Speichern</button> </td>';
      echo "</form>";
      echo "</tr>";
    }
    echo "</table>";
    if($_POST['edit2'] == "edit")
    {
      $update="update film, director set name='".$_POST['filmname']."', erscheinungsjahr='".$_POST['fjahr']."', dvorname='".$_POST['filmdvname']."', dnachname='".$_POST['filmdnachn']."', beschreibung='".$_POST['fdescr']."', avgrating='".$_POST['frating']."', fsk='".$_POST['ffsk']."' where film_ID='".$_POST['filmid']."'";
      mysqli_query($link,$update);
    }
    mysqli_close($link);
  }
}

elseif ($_SESSION["edittoken"]==3) {
  echo "Hier stehen Directoren" . $_SESSION['edittoken']; echo "Die ID ist" . $ID;
  if(!$link=mysqli_connect("127.0.0.1","root",""))
  {
    echo "Verbindungsaufbau gescheitert.";
  }
  else
  {
    mysqli_set_charset($link,"utf8");
    $db=mysqli_select_db($link,"webmult");
    $result = mysqli_query($link,"SELECT * FROM director WHERE director_id='$ID'");

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
      echo "<td><input type='textarea' value=" . $row['director_id'] . "></input></td>";
      echo "<td><input type='textarea' value=" . $row['dvorname'] . "></input></td>";
      echo "<td><input type='textarea' value=" . $row['dnachname'] . "></input></td>";
      echo '<td><button name="edit"  value="edit" type="submit">Speichern</button> </td>';
    }
      echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
  }

  elseif ($_SESSION['edittoken']==4) {
    echo "Hier stehen Ratings" . $_SESSION['edittoken'];
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
        echo "<td><input type='textarea' value=" . $row['rating_ID'] . "></input></td>";
        echo '<td><textarea name="filmname">'; echo $row['name']; echo '</textarea></td>';
        echo "<td><input type='textarea' value=" . $row['username'] . "></input></td>";
        echo "<td><input type='textarea' value=" . $row['wert'] . "></input></td>";
        echo "<td><textarea class='filmdescr' name='comment'>"; echo $row['commnt']; echo "</textarea></td>";
        echo '<td><button name="edit"  value="edit" type="submit">Speichern</button> </td>';
      }
        echo "</tr>";
      }
      echo "</table>";

      mysqli_close($link);
    }
}
}
else {
  echo "YOU SHALL NOT PASS!!!!";
}
?>
</html>
