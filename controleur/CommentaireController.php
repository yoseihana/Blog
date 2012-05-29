<?php

include 'modeles/commentairem.php';
include 'modeles/Article.php';

function modifier()
{
    global $a, $c;

    // Récupère l'isbn depuis $_REQUEST avec gestion d'erreurs
    $id_commentaire = _getIdcommentaireFromRequest();

    // Test l'existance de l'isbn dans la DB
    _testIdcommentaire($id_commentaire);

    // POST - modifier le livre en DB
    // GET - données pour le formulaire
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['commentaire']['id_commentaire'] = $id_commentaire;
        $champs['commentaire']['nom_auteur'] = $_POST['nom_auteur'];
        $champs['commentaire']['texte'] = $_POST['texte'];

        updateComment($champs);

        $id_article = $_POST['id_article'];

        header('Location:' . voirArticleUrl($id_article, 'comments')); // donne la page index.php qui est par défaut
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $commentaire = findCommentById($id_commentaire);

        $data['view_title'] = 'Modification du commentaire: ' . $commentaire['nom_auteur'];
        $data['commentaire'] = $commentaire; // Le livre à modifier

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }
}

function ajouter()
{
    global $a, $c;

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['commentaire']['nom_auteur'] = $_POST['nom_auteur'];
        $champs['commentaire']['texte'] = $_POST['texte'];
        $champs['commentaire']['date'] = date('Y-m-d');

        $champs['commentaire']['id_article'] = $_POST['id_article'];

        addComment($champs);

        // Redirection
        header('Location:' . voirArticleUrl($_POST['id_article'], 'comments')); // donne la page index.php qui est par défaut
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $id_article = _getIdarticleFromRequest();

        $data['view_title'] = 'Ajout d\'un commentaire';
        $data['article']['id_article'] = $id_article;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html); // returne
    }
}

function supprimer()
{
    global $a, $c;

    $id_commentaire = _getIdcommentaireFromRequest();
    _testIdcommentaire($id_commentaire);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        deleteComment($id_commentaire);

        header('Location:' . listerArticleUrl());
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $commentaire = findCommentById($id_commentaire);

        $data['view_title'] = 'Suppression du commentaire ' . $commentaire['nom_auteur'];
        $data['commentaire'] = $commentaire;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }
}

function voir()
{
    global $a, $c;

    $id_commentaire = _getIdcommentaireFromRequest();
    _testIdcommentaire($id_commentaire);

    $commentaire = findCommentById($id_commentaire);

    $data['view_title'] = 'Commentaire de ' . $commentaire['nom_auteur'];
    $data['commentaire'] = $commentaire;
    $data['article']['id_article'] = findArticleById($commentaire['id_article']);

    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _getIdcommentaireFromRequest()
{
    global $a;

    if (!isset($_REQUEST['id_commentaire']))
    {
        die('Vous devez fournir un id commentaire pour ' . $a . ' un commentaire');
        //header('Location:index.php?c=error&a=e_404');
    }

    return $_REQUEST['id_commentaire'];
}

function _getIdArticleFromRequest()
{
    global $a;

    if (!isset($_REQUEST['id_article']))
    {
        die('Vous devez fournir un id article pour ' . $a . ' un commentaire');
        //header('Location:index.php?c=error&a=e_404');
    }

    return $_REQUEST['id_article'];
}


function _testIdcommentaire($id_commentaire)
{
    if (countCommentById($id_commentaire) < 1)
    {
        die('L\'id commentaire fourni n\'existe pas dans la base de données');
        //header('Location:index.php?c=error&a=e_404');
    }
}