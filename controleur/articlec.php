<?php

include 'modeles/Article.php';
include 'modeles/commentaire.php';

function lister()
{
    /* global $a, $c;

$data['view_title'] = 'Liste des articles';
$data['articles'] = getAllArticles();
//$data['article']['categories'] = getAllCategories();

$html = $a . $c . '.php';
return array('data' => $data, 'html' => $html); */

    global $a, $c;
    $totalArticles = countArticle();

    $nombreDePages = ceil($totalArticles['total'] / 5);

    if (isset($_GET['page']))
    {
        $pageActuelle = intval($_GET['page']);
        if ($pageActuelle > $nombreDePages)
        {
            $pageActuelle = $nombreDePages;
        }
    }
    else
    {
        $pageActuelle = 1;
    }

    $pagination = ($pageActuelle - 1) * 5;
    $data['articles'] = getAllArticles($pagination);
    $data['nbPage'] = $nombreDePages;

    $html = $a . $c . '.php';
    $view = array('data'=> $data, 'html'=> $html);

    return $view;
}

function modifier()
{
    global $a, $c;

    $id_article = _getIdarticleFromRequest();
    _testIdarticle($id_article);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $champs['article']['id_article'] = $id_article;
        $champs['article']['titre'] = $_POST['titre'];
        $champs['article']['article'] = $_POST['article'];

        updateArticle($champs);

        header('Location:' . voirArticleUrl($id_article));
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $article = findArticleById($id_article);

        $data['view_title'] = 'Modification de l\'article "' . $article['titre'] . '"';
        $data['article'] = $article;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }

}

function ajouter()
{
    global $a, $c;

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $champs['article']['titre'] = $_POST['titre'];
        $champs['article']['article'] = $_POST['article'];
        $champs['article']['date_parution'] = date('Y-m-j');

        addArticle($champs);

        header('Location:' . listerArticleUrl($champs['article']));
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $data['view_title'] = 'Ajout d\'article: ';
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }
}

function supprimer()
{
    global $a, $c;

    $id_article = _getIdarticleFromRequest();
    _testIdarticle($id_article);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        deleteArticle($id_article);

        header('Location:' . listerArticleUrl());
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $article = findArticleById($id_article);

        $data['view_title'] = 'Suppression de l\'article ' . $article['titre'];
        $data['article'] = $article;

        $html = $a . $c . '.php';
        return array('data' => $data, 'html' => $html);
    }
}

function voir()
{
    global $a, $c;

    $id_article = _getIdarticleFromRequest();
    _testIdarticle($id_article);

    $article = findArticleById($id_article);

    $data['view_title'] = 'Article: ' . $article['titre'];
    $data['article'] = $article;
    $data['article']['commentaires'] = findCommentsByIdArticle($article['id_article']);

    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _getIdarticleFromRequest()
{
    global $a;

    if (!isset($_REQUEST['id_article']))
    {
        die('Vous devez fournir un id article pour ' . $a . ' un article');
        //header('Location:index.php?c=error&a=e_404');
    }

    return $_REQUEST['id_article'];
}

function _testIdarticle($id_article)
{
    if (countArticleById($id_article) < 1)
    {
        die('L\'id_article fourni n\'existe pas dans la base de données');
        //header('Location:index.php?c=error&a=e_404');
    }
}