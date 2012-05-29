<?php

require_once 'DB.php';
require_once './controleur/MainController.php';
require_once './controleur/ArticleController.php';

// DB Config (PDO)
define(DB::DRIVER, 'mysql');
define(DB::HOST, 'localhost');
define(DB::NAME, 'blog');
define(DB::USER, 'root');
define(DB::PASSWORD, 'root');

define(MainController::DEFAULT_CONTROLLER, ArticleController::getName());
define(MainController::DEFAULT_ACTION, ArticleController::getDefaultAction());

$validExtentions = array(
    'jpg',
    'png',
    'jpeg',
    'JPEG',
    'gif');

$upload_dir = './img';

$connected = TRUE; // remettre à false quand la connexion sera ok