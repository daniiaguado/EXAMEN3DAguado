<?php

require_once 'autoload.php'; 

$confFile = "./db/config.csv";
$importLamp = 'lamparas.csv';
$importador = new Lighting($confFile); 
$importador->importLamps($importLamp);



?>