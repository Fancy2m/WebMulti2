<?php
  session_start();
  $id=$_SESSION['id'];
  echo $id;


  $link=mysqli_connect("127.0.0.1","root","");
  mysqli_set_charset($link,"utf8");
  $db=mysqli_select_db($link, "webmult");
  $abfrage="select film.name, film.bild, film.erscheinungsjahr, director.dvorname, director.dnachname, film.beschreibung, film.avgrating, film.fsk from film join director on director_id=director_fid where film_ID = '$id'";
  $result=mysqli_query($link,$abfrage);

  while($row = mysqli_fetch_array($result)) //ausgabe der Daten über den spezifischen Film
  {
    echo '<div class="name">'; echo $row['name'] . "</div><br>";
    echo '<div class="bild">'; '<img src="' . $row['bild'] . '" alt="error">' . "</div><br>";
    echo '<div class="info">';echo $row['erscheinungsjahr'] . ", </div>";
    echo '<div class="info">';echo $row['dvorname'] ; echo " ";
    echo $row['dnachname'] . ", </div>";
    echo '<div class="info">';echo $row['fsk'] . "</div><br>";
    echo '<div class="desc">';echo $row['beschreibung'] . "</div><br>";
    echo '<div class="info">Rating: ';echo $row['avgrating'] . "</div><br>";
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
<link rel="stylesheet" href="film.css">
<body>
  <form method="POST" action="specificfilmpage.php"> <!-- Slider für Rating -->
  <div class="slidecontainer">
    <input type="range" min="1" max="10" value="5" class="slider" name="slider" id="myRange">
    <button type="submit" name="doit" value="raten">Rate me</button>
  </div>
</body>
</html>
