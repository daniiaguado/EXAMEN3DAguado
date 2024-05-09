<?php

require_once 'autoload.php';
$confFile = "./db/config.csv";
$gestion = new Lamp($confFile);
$id=$_GET["id"];
$brand = $gestion->getLampById($id);
header('Location: index.php');
?>