<?php
session_start();
$i=$_GET['var'];
$_SESSION['id']=$i;

include "index.php";
include "specificfilm.php";
 ?>
