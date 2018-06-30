<?php
  session_start();
  $id=$_SESSION['id'];
  echo $id;
  echo "Hallo";

  $link=mysqli_connect("127.0.0.1","root","");
  mysqli_set_charset($link,"utf8");
  $db=mysqli_select_db($link, "webmult");
  $abfrage="select film.name, film.erscheinungsjahr, director.dvorname, director.dnachname, film.beschreibung, film.avgrating, film.fsk from film join director on director_id=director_fid where film_ID = '$id'";
  $result=mysqli_query($link,$abfrage);

  while($row = mysqli_fetch_array($result))
  {
    echo $row['name'];
    echo $row['erscheinungsjahr'];
    echo $row['dvorname'];
    echo $row['dnachname'];
    echo $row['beschreibung'];
    echo $row['avgrating'];
    echo $row['fsk'];
  }
  if($_POST['doit']=="raten")
  {
    $test=$_POST['slider'];
    echo $test;
    echo $id;
    $update="update film set avgrating='$test' where film_ID='$id'";
    mysqli_query($link,$update);
  }
 ?>

<html>
<body>
  <form method="POST" action="specificfilm.php">
  <div class="slidecontainer">
    <input type="range" min="1" max="10" value="5" class="slider" name="slider" id="myRange">
    <button type="submit" name="doit" value="raten">Rate me</button>
  </div>
</body>
</html>
