<?php

// Définition du fuseau horaire
date_default_timezone_set('Europe/Paris');

// Session
session_start();

// Connexion à la BDD
$pdo = new PDO(
    'mysql:host=sql25;dbname=gml42373',
    'gml42373',
    'PzVzLCAEAXnb',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    )
);

// Définition de constantes
define('URL', 'http://eclope.thirat-pagny.fr/');
define('SALT', 'C0mpliqu3!');



// Inclusion du fichier de fonctions
require_once('functions.php');

