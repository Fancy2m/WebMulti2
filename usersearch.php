<html>
<link rel="stylesheet" href="layout.css">
  <body>
    <?php
	if($_POST['usuchen'] == "USuchen")
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
			$abfrage=" SELECT * from benutzer where benutzer.username like '%$suche%' or benutzer.nachname like '%$suche%' or benutzer.vorname like '%$suche%'";
			$result=mysqli_query($link,$abfrage);
      echo "<table border='1'>
      <tr>
      <th>Benutzer ID</th>
      <th>Benutzername</th>
      <th>Passwort</th>
      <th>Vorname</th>
      <th>Nachname</th>
      <th>Geburtstag</th>
      <th>Geschlecht</th>
      <th>E-Mail</th>
      <th>Rechte</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>" . $row['user_ID'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['passwort'] . "</td>";
        echo "<td>" . $row['vorname'] . "</td>";
        echo "<td>" . $row['nachname'] . "</td>";
        echo "<td>" . $row['geburtstag'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['rechte'] . "</td>";
        echo "</tr>";

			}

      echo "</table>";
		}
  }
?>

</body>
</html>
