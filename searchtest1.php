<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <form action="index.php" method="POST">
    <input type="text" name="search">
    <button type="submit" name="suchen" value="Suchen">Suchen</button>
.
    </form>
  </body>
</html>
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
			$abfrage="select film.name, film.erscheinungsjahr, director.dvorname, director.dnachname, film.beschreibung, film.avgrating, film.fsk from film join director on director_id=director_fid where film.name like '%$suche%' or director.dnachname like '%$suche%'";
			$result=mysqli_query($link,$abfrage);
      echo "<table border='1'>
      <tr>
      <th>Filmtitel</th>
      <th>Erscheinungsjahr</th>
      <th>Director Vorname</th>
      <th>Director Nachname</th>
      <th>Beschreibung</th>
      <th>Durchschnittsrating</th>
      <th>Altersfreigabe</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo '<td><p name="filmname">'; echo $row['name']; echo '</textarea></td>';
				echo "<td><p>" . $row['erscheinungsjahr'] . "</p></td>";
				echo "<td><p>" . $row['dvorname'] . "</p></td>";
				echo "<td><p>" . $row['dnachname'] . "</p></td>";
				echo "<td><p>" . $row['beschreibung']. "</p></td>";
				echo "<td><p>" . $row['avgrating'] . "</p></td>";
				echo "<td><p>" . $row['fsk'] . "</p></td>";

        echo "</tr>";
      }
      echo "</table>";
		}
  }
?>
