<?php
$kontrollvariable = 0;
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
		$username=$_POST['username'];
		$email=$_POST['email'];
		$abfrage="select username from benutzer where username like '$username' LIMIT 1";
		$ergebnis=mysqli_query($link,$abfrage);
		$row=mysqli_fetch_object($ergebnis);

		if($row->username==$_POST['username'])//Prüfung auf Doppelung
		{
			echo "Dieser Benutzername wurde bereits vergeben!";
		}

		elseif ($row->email==$_POST['email']) {
			echo "Fehler! Diese Email-Adresse wurde bereits registriert.";
		}
		else//Neuen eintrag in dei Datenbank schreiben
		{
			$input="insert into benutzer values(null,'".$_POST['username']."','".$_POST['passwort']."','".$_POST['vorname']."','".$_POST['nachname']."','".$_POST['geburtstag']."','".$_POST['gender']."','".$_POST['email']."',0)";
			if(!mysqli_query($link,$input))
			{
				echo "Fehler, Person konnte nicht hinzugefügt werden!";
				echo $input;
			}
			else
			{
				echo "Sie wurden erfolgreich registriert! Ein Admin muss ihren Account noch aktivieren.";
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
    <form action="register.php" method="POST">
    <h2>Registrierung</h2>
		<div class="center" >
    <input type="text" placeholder="Benutzername" name="username"class="inputfield" ></input><br>
    <input type="password" placeholder="Passwort" name="passwort" class="inputfield"></input><br>
    <input type="text" placeholder="Vorname" name="vorname" class="inputfield"></input><br>
    <input type="text" placeholder="Nachname" name="nachname" class="inputfield"></input><br>
    <input type="text" placeholder="JJJJ-MM-TT" name="geburtstag" class="inputfield"></input><br>
		<select name="gender" class="dropdown" style=">
			<option value="">Auswählen...</option>
			<option value="M">Männlich</option>
			<option value="W">Weiblich</option>
		</select><br>
    <input type="Email" placeholder="Email-Adresse" name="email" class="inputfield"></input><br>
    <button type="submit" name="create" value="Erstellen">Erstellen</button>
	</div>
	</form>
</body>
</html>
