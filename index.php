<?php

session_start();


ini_set('display_errors', 1);

include ('./config/config.php');
include('./helpers/url.php');

try
{
    $connex = new PDO(DSN, USER, PASS, $options);
    $connex->query('SET CHARACTER SET UTF8');
    $connex->query('SET NAMES UTF8');

}
catch (PDOException $e)
{
    die($e->getMessage());

}

//Routage
if (isset ($_REQUEST['a']) && isset ($_REQUEST['c']))
{
    if (in_array($_REQUEST['a'], $validActions) && in_array($_REQUEST['c'], $validControllers))
    {
        $a = $_REQUEST['a'];
        $c = $_REQUEST['c'];

    } else
    {

        die('a et ou c ne sont pas valides');
        //header('Location:index.php?c=error&a=e_404');
    }
}
else
{
    $a = DEFAULT_ACTION; // lister
    $c = DEFAULT_CONTROLLER; //article
}


include('controleur/' . $c . 'controleur.php');

$view = call_user_func($a);

$connected = isset($_SESSION['connected']) ? $_SESSION['connected'] : false;

include ('vues/layout.php');