<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <?php
    session_start();
    if($_SESSION['login']==1)
    {  include "index.php";
      $wert = $_GET['var'];

      if($wert==1)
      {
        echo "Hier stehen Userdaten $wert";
        if(!$link=mysqli_connect("127.0.0.1","root",""))
      	{
      		echo "Verbindungsaufbau gescheitert.";
      	}
      	else
      	{
      		mysqli_set_charset($link,"utf8");
      		$db=mysqli_select_db($link,"webmult");
          $result = mysqli_query($link,"SELECT * FROM benutzer");

          echo "<table border='1'>
          <tr>
          <th>Nutzer-ID</th>
          <th>Benutzername</th>
          <th>E-Mail Adresse</th>
          <th>Rechte</th>
          <th>Aktiviert?</th>
          <th>Bearbeiten</th>
          </tr>";

          while($row = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>" . $row['user_ID'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['rechte'] . "</td>";

            if ($row['rechte']==0)
              {
                echo '<td><form action="adminpanel.php" method="POST"><button type="submit" name="activate" value="activate">Nein!</button></form></td>';
              }

            else
              {
              echo '<td><form action="editdata.php" method="POST"><button type="submit" name="deactivate" value="deactivate">Ja</button></form></td>';
              }
           echo '<td><form action="editdata.php?var='.$row['user_ID'].'" method="POST"> <button name="edituser"  value="edit" type="submit">bearbeiten</button> </form> </td>';
           echo "</tr>";
          }
          echo "</table>";

          mysqli_close($link);
        }
      }

      elseif ($wert==2) {
        echo "Hier stehen Filmdaten $wert";
        if(!$link=mysqli_connect("127.0.0.1","root",""))
      	{
      		echo "Verbindungsaufbau gescheitert.";
      	}
      	else
      	{
      		mysqli_set_charset($link,"utf8");
      		$db=mysqli_select_db($link,"webmult");
          $result = mysqli_query($link,"SELECT * FROM film, director WHERE director.director_ID LIKE film.director_fid");

          echo "<table border='1'>
          <tr>
          <th>Film ID</th>
          <th>Filmtitel</th>
          <th>Director</th>
          <th>Durschnittliche Wertung</th>
          <th>Poster</th>
          <th>Bearbeiten</th>
          </tr>";

          while($row = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>" . $row['film_ID'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['dvorname']; echo '&nbsp'; echo $row['dnachname'] . "</td>";
            echo "<td>" . $row['avgrating'] . "</td>" ;
            echo '<td> <img src="' . $row['bild'] . '" alt="error"></td>';
            echo '<td> <img src="' . $row['bild'] . '" alt="error", width="240px"; height="160px"></td>';
            echo '<td><form action="editdata.php?var='.$row["film_ID"].'" method="POST"> <button name="editfilm"  value="edit" type="submit">bearbeiten</button> </form> </td>';
            }
            echo "</tr>";
          }
          echo "</table>";

          mysqli_close($link);
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
            $result = mysqli_query($link,"SELECT * FROM director");

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
              echo "<td>" . $row['director_id'] . "</td>";
              echo "<td>" . $row['dvorname'] . "</td>";
              echo "<td>" . $row['dnachname'] . "</td>";
              echo '<td><form action="editdata.php?var='.$row['director_id'].'" method="POST"> <button name="editdirector" value="edit" type="submit">bearbeiten</button> </form> </td>';
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
                                            AND rating.film_rid LIKE film.film_ID
                                            ORDER BY rating.rating_ID ASC ");

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
                echo "<td>" . $row['rating_ID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['wert'] . "</td>" ;
                echo '<td>' . $row['commnt'] . '</td>';
                echo '<td><form action="editdata.php?var='.$row['rating_ID'].'" method="POST"> <button name="editrating"  value="edit" type="submit">bearbeiten</button> </form> </td>';
                }
                echo "</tr>";
              }
              echo "</table>";

              mysqli_close($link);
            }

      else {
        echo "Bitte wählen Sie eine Option aus.";
      }
 }
  /*  else {
      echo "Sie haben das Recht dazu!! YOU SHALL NOT PASS!!!!11einself";
    }*/
    ?>

  </body>
</html>
