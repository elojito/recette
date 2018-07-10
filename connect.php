<?php

define('SERVER', "localhost");
define('USER', "root");
define('PASSWORD', "");
define('BASE', "recettes");

try{
    $connexion = new PDO("mysql:host=".SERVER.";dbname=".BASE, USER, PASSWORD);
    $connexion->exec("SET CHARACTER SET utf8"); 
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
    echo array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}


?>