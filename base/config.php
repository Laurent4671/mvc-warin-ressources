<?php
// definition les parametres d'acces à la db
define("DB_NOM", "root");
define("DB_PASS", "");
define("DB_SERVEUR", "localhost");
define("DB_BASE", "mvc_warin_ressources");

define("DEBUG", true);
define("WWW_UP", "upload/");


// on inclus les accès aux fonctions
include_once('fct_db.php');
include_once('fct_global.php');


// connexion à la base de donnnées
$mysqli = Connexion(DB_NOM, DB_PASS, DB_BASE, DB_SERVEUR);

?>
