<?php

/*define(DB::DRIVER, 'mysql');
define(DB::HOST, 'localhost');
define(DB::NAME, 'blog');
define(DB::USER, 'root');
define(DB::PASSWOR, 'root'); */

$validControllers = array(
    'article'     => 'article',
    'commentaire' => 'commentaire',
    'categorie'   => 'categorie',
    'membre'      => 'membre',
    'error'       => 'error');
$validActions = array(
    'lister'      => 'lister',
    'modifier'    => 'modifier',
    'supprimer'   => 'supprimer',
    'voir'        => 'voir',
    'ajouter'     => 'ajouter',
    'deconnecter' => 'deconnecter',
    'connecter'   => 'connecter',
    'e_404'       => 'e_404',
    'e_database'  => 'e_database',
    'e_user'      => 'e_user');

define('DEFAULT_CONTROLLER', $validControllers['article']); // utilisation lorsqu'on vient sur l'application et qu'il n'y a pas de param, par défaut on affiche la liste des livres. Ici livre
define('DEFAULT_ACTION', $validActions['lister']); // par défaut, les livres seront lister. Ici lister

define('DSN', 'mysql:host=localhost;dbname=blog'); // le seul endroit où il peut avoir le mysql pour le SGBD, c'est le format type du DSN
define('USER', 'root');
define('PASS', 'root');

$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Le mode de gestion des erreur de PDO doit ê les exceptions --> lorsqu'il y a une erreur a la bd PDO lance une exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // fetch = manière de récupérer les données de la BD ds un format spécifique pr lire en php, ici en tableau associatif
);

$connected = true;