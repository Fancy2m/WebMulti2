<?php
	session_start();
	if($_POST['suchen'] == "Suchen")
	{
		if(!$link=mysqli_connect("127.0.0.1","root",""))
		{
			echo "Verbindungsaufbau gescheitert.";
		}
		else
		{
			mysqli_set_charset($link,"utf8");
			$db=mysqli_select_db($link, "webmult");
      $suche=$_POST['search'];
			$abfrage="select film.film_ID, film.name, film.erscheinungsjahr, director.dvorname, director.dnachname, film.beschreibung, film.avgrating, film.fsk, film.bild from film join director on director_id=director_fid where film.name like '%$suche%' or director.dnachname like '%$suche%'";
			$result=mysqli_query($link,$abfrage);
      echo "<table border='1'>
      <tr>
      <th>Film</th>

      <th>Director</th>
      <th>Rating</th>

      </tr>";

      while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo '<td><a class="search" href="specificfilmpage.php">'; echo $row['name'];	echo '<br> <img src="' . $row['bild'] . '" alt="error">'; echo '</a></td>';

				echo "<td>" . $row['dvorname']; echo " "; echo $row ['dnachname']; echo "</td>";
        echo "<td>" . $row['avgrating'] . "</td>";

        $filmid=$row['film_ID'];
			}
        echo "</tr>";
        $_SESSION['id']=$filmid;
      }

      echo "</table>";
		}
?>

<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <form action="index.php" method="POST">
    <input type="text" name="search">
    <button type="submit" name="suchen" value="Suchen">Suchen</button>

    </form>
  </body>
</html>
