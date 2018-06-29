<!--<?php

if (isset($_POST['submit']))
{
$result=$_POST['num1']*$_POST['num2'];
}
?>
<html><body>
<form action="#" method="post">
Num1:<input name="num1"><br>
Num2:<input name="num2">
Answer: <input value="<?php if (isset($result)) echo $result ?>"> <input type="submit" name="submit">
</form>
</body></html> -->

<?php
include "adminmenu.php";
$wert = $_GET['var'];
$con = 0;

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
    <th>Aktivierung</th>
    <th>Speichern</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td><input value=" .$row['user_ID']. "></input></td>";
      echo "<td><input value=" . $row['username'] . "></input></td>";
      echo "<td><input value=" . $row['email'] . "></input></td>";
      echo "<td><input value=" . $row['rechte'] . "></input></td>";
      if ($row['rechte']==0)
        {
          echo '<td><button value="activate" name="activate">Aktivieren!</button></td>';
        }

      else {
          echo '<td><button value="deactivate" name="deactivate" type="submit">Deaktivieren!</button></td>';
        }
     echo '<td> <button name="edit"  value="edit" type="submit">Speichern</button> </td>';
     echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
  }
}

?>
