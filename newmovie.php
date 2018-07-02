<?php
$kontrollvariable = 0;
error_reporting(0);
if($_POST['create']=="Erstellen")
{
	$kontrollvariable=1;
	if(!$link=mysqli_connect("127.0.0.1","root",""))
	{
		echo "Verbindungsaufbau gescheitert.";
	}
	else
	{
		mysqli_set_charset($link,"utf8");
		$db=mysqli_select_db($link,"webmult");
		$name=$_POST['name'];

		$abfrage="select name from film where name like '$name' LIMIT 1";
		$ergebnis=mysqli_query($link,$abfrage);
		$row=mysqli_fetch_object($ergebnis);

		if($row['name']==$_POST['name'])
		{
			echo "Dieser Film wurde bereits registriert!";

		}
		else
		{
			$input='SELECT * FROM director WHERE dvorname='".$POST'[dvorname]."' AND dnachname ='".$_POST['dnachname']"'. ORDER BY director_id';

			$input="insert into director (director_id, dvorname, dnachname) values ('null','".$_POST['dvorname']."','".$_POST['dnachname']."')";
			if(!mysqli_query($link,$input))
			{
				echo "Fehler, Film konnte nicht hinzugefügt werden!";
				echo $input;
			}
			else
			{
					$input="insert into film (film_ID, name, erscheinungsjahr,beschreibung, bild, fsk) values('null','".$_POST['name']."','".$_POST['erscheinungsjahr']."','null''".$_POST['beschreibung']."',null,'".$_POST['bild']."','".$_POST['fsk']."')";
					mysqli_query($link, $input);
				echo "Film wurde aufgenommen";
			}
		}
		mysqli_close($link);
	}
}
else
{
	if ($kontrollvariable==1){
		echo "Fehler! Bitte Überprüfen Sie Ihre Angaben.";
	}
}
?>

<html>

<head>
</head>
<body>
<link rel="stylesheet" href="layout.css">
  <nav>
  </nav>
    <form action="newmovie.php" method="POST">
    <h2>Film hinzufügen</h2>
		<div class="center" >
    <input type="text" placeholder="Name" name="name"class="inputfield" ></input><br>
    <input type="text" placeholder="Erscheinungsjahr" name="erscheinungsjahr" class="inputfield"></input><br>
    <input type="text" placeholder="Vorname" name="dvorname" class="inputfield"></input><br>
    <input type="text" placeholder="Nachname" name="dnachname" class="inputfield"></input><br>
		<input type="text" placeholder="beschreibung" name="beschreibung" class="inputfield"></input><br>
    <input type="text" placeholder="FSK" name="fsk" class="inputfield"></input><br>
    <input type="text" placeholder="bild" name="bild" class="inputfield"></input><br>
    <button type="submit" name="create" value="Erstellen">Erstellen</button>
	</div>
	</form>
</body>
</html>
