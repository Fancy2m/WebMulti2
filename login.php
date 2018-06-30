<?php
	session_start();
	if($_POST['lbutton'] == "Login")
	{
		if(!$link=mysqli_connect("127.0.0.1","root",""))
		{
			echo "Verbindungsaufbau gescheitert.";
		}
		else
		{
			mysqli_set_charset($link,"utf8");
			$db=mysqli_select_db($link, "webmult");
			$username=$_POST['lname'];
			$passwort=$_POST['lpass'];

			$abfrage="select username, passwort, rechte from benutzer where username like '$username' LIMIT 1";
			$ergebnis=mysqli_query($link,$abfrage);
			$row=mysqli_fetch_object($ergebnis);
			$_SESSION["accname"]=$row->username;
			$_SESSION["gruppe"]=$row->rechte;
			$_SESSION["Nutzervorname"]=$row->vorname;

			if($row->passwort==$passwort)
			{
				$_SESSION["login"]="1";
				if($row->rechte==1)
				{

					echo "<html><body><meta http-equiv=REFRESH CONTENT=1;url=index.php></body></html>";
				}
				else
				{
					if($row->rechte==2)
					{
						echo "<html><body><meta http-equiv=REFRESH CONTENT=1;url=adminpanel.php></body></html>";
					}
					else
					{
						echo "Sie haben nicht die Berechtigung, das zu tun.";
					}
				}
			}
			else
			{
				echo "Benutzername und/oder Passwort falsch";
			}
			mysqli_close($link);
		}
	}
	if($_POST['lgbutton']=="Logout")
	{
		session_destroy();
		echo"<html><body><meta  http-equiv=REFRESH CONTENT=1; url=loginpage.php></body></html>";
	}
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="layout.css">
	</head>
	<body>
		<?php
			if($_SESSION['login']==1) {
				echo "Sie sind bereits eingeloggt.";
							if ($_SESSION['rechte']==2) {
								include "adminmenu.php";
							}
			}

			else{
				echo '<form action="loginpage.php" method="POST">
								<div class="center" >
									<input type="text" placeholder="Benutzername" name="lname"><br>
									<input type="password" placeholder="Passwort" name="lpass"><br>
									<button type="submit" value="Login" name="lbutton">Login</button>
								</div>
							</form>';

			}

		?>
	</body>
</html>
