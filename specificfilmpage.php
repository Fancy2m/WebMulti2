<?php

error_reporting(0);
session_start();
$i=$_GET['var'];
$_SESSION['id']=$i;

include "index.php";
include "specificfilm.php";
//Einfügen in das Seitendesign
 ?>
