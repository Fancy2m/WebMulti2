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
      $suche=$POST['search'];
<<<<<<< HEAD
			$abfrage="select film.name, film.erscheinungsjahr, director.dvorname, director.dnachname, film.beschreibung, film.avgrating, film.fsk from film join director on director_id=director_fid where film.name like %'$suche'% or director.dnachname like %'$suche'%";
=======
			$abfrage="select * from film join director on director_id=director_fid where film.name like %'$suche'% or director.dnachname like %'$suche'%";
>>>>>>> 48da4422b4580a7e2e0c6b36fdc9e0cfaea681a0
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
        echo '<td><textarea name="filmname">'; echo $row['name']; echo '</textarea></td>';
        echo "<td><input type='textarea' value=" . $row['erscheinungsjahr'] . "></input></td>";
        echo "<td><input type='textarea' value=" . $row['dvorname'] . "></input></td>";
        echo "<td><input type='textarea' value=" . $row['dnachname'] . "></input></td>";
        echo "<td><input type='textarea' value=" . $row['beschreibung']. "></input></td>";
        echo "<td><input type='textarea' value=" . $row['avgrating'] . "></input></td>";
        echo "<td><input type='textarea' value=" . $row['fsk'] . "></input></td>";
        echo '<td> <button name="edit"  value="edit" type="submit">Speichern</button> </td>';
        echo "</tr>";
      }
      echo "</table>";
		}
  }
?>

<html>
	<link rel="stylesheet" href="layout.css">
  <body>
    <form action="searchtest1.php" method="POST">
    <input type="text" name="search">
    <button type="submit" name="suchen" value="Suchen">Suchen</button>

    </form>
  </body>
</html>
