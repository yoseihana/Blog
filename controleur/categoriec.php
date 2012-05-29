<?php

include 'modeles/Articlem.php';
include 'modeles/Categoriem.php';

function lister()
{
    global $a, $c;

    $data['view_title'] = 'Liste des catégories';
    $data['categories'] = getAllCategories();
    $html = $a . $c . '.php';
    return array('data' => $data, 'html' => $html);
}

function modifier()
{
    global $a, $c;

    $id_categorie = _getIdCategorieFromRequest();
    _testIdCategorie($id_categorie);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['categorie']['id_categorie'] = $id_categorie;
        $champs['categorie']['categorie'] = $_POST['categorie'];

        updateCategorie($champs);

        header('Location:' . voirCategorieUrl($id_categorie));
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $categorie = findCategorieById($id_categorie);

        $data['view_title'] = 'Modification de la catégorie "' . $categorie['categorie'] . '"';
        $data['categorie'] = $categorie;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }
}

function ajouter()
{
    global $a, $c;

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $champs['categorie']['id_categorie'] = $_POST['id_categorie'];
        $champs['categorie']['categorie'] = $_POST['categorie'];

        addCategorie($champs);

        header('Location:' . listerCategorieUrl($champs['categorie']));
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $data['view_title'] = 'Ajout d\'une catégorie: ';
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }
}

function supprimer()
{
    global $a, $c;

    $id_categorie = _getIdCategorieFromRequest();
    _testIdCategorie($id_categorie);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        deleteCategorie($id_categorie);

        header('Location:' . listerCategorieUrl());
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $categorie = findCategorieById($id_categorie);

        $data['view_title'] = 'Suppression de la catégorie ' . $id_categorie['categorie'];
        $data['categorie'] = $categorie;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }
}

function voir()
{
    global $a, $c;

    $id_categorie = _getIdCategorieFromRequest();
    _testIdCategorie($id_categorie);

    $categorie = findCategorieById($id_categorie);

    $data['view_title'] = 'Categorie: ' . $categorie['categorie'];
    $data['categorie'] = $categorie;
    //$data['article']['commentaires'] = findCommentsByIdArticle($article['id_article']);

    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _getIdCategorieFromRequest()
{
    global $a;

    if (!isset($_REQUEST['id_categorie']))
    {
        die('Vous devez fournir un id catégorie pour ' . $a . ' un article');
        //header('Location:index.php?c=error&a=e_404');
    }

    return $_REQUEST['id_categorie'];
}

function _testIdCategorie($id_categorie)
{
    if (countCategorieById($id_categorie) < 1)
    {
        die('L\'id catégorie fourni n\'existe pas dans la base de données');
        //header('Location:index.php?c=error&a=e_404');
    }
}