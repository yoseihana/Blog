<?php

include 'modeles/' . $c . '.php';

function lister()
{
    global $a, $c;

    $data['view_title'] = 'Liste des articles';
    $data['articles'] = getList();
    $html = $a . $c . '.php';
    return array('data' => $data, 'html' => $html);
}

function modifier()
{
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_article'])) {
        $id_article = $_REQUEST['id_article'];
        if (!_idArticleExiste($id_article)) {
            die('l\'id article fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else
    {
        die('vous devez fournir un id article pour voir l\'article');
        //header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $champsArticle['titre'] = $_POST['titre'];
        $champsArticle['article'] = $_POST['article'];
        $champsArticle['id_article'] = $id_article;

        update($champsArticle);

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['voir'] . '&c=' . $validEntities['article'] . '&id_article=' . $id_article);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $data['article'] = getOne($id_article);
        $data['view_title'] = 'Modification d\'article: ' . $data['article']['titre'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }


}

function ajouter()
{
    global $a, $c, $validActions, $validEntities;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        add();

        header('Location:' . $_SERVER['PHP_SELF']);
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
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_article'])) {
        $id_article = $_REQUEST['id_article'];
        if (!_idArticleExiste($id_article)) {
            header('Location:index.php?c=error&a=e_404');
        }
    }
    else
    {
        header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        delete($id_article);

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['lister'] . '&c=' . $validEntities['article'] . '&id_article=' . $id_article);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $data['article'] = getOne($id_article);
        $data['view_title'] = 'Supression de l\'article: ' . $data['article']['titre'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }


}

function voir()
{
    global $a, $c;

    if (isset($_GET['id_article'])) {

        $id_article = $_GET['id_article'];

        if (!_idArticleExiste($id_article)) {
            die('l\'id article fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else {
        die('vous devez fournir un id article pour voir l\'article');
        //header('Location:index.php?c=error&a=e_404');
    }

    $data['articles'] = getList();
    $data['article'] = getOne($id_article);
    $data['view_title'] = 'Fiche de l\'article: ' . $data['article']['titre'];
    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _idArticleExiste($id_article)
{
    if (!getidArticleCount($id_article)) {
        return false;
    }
    else {
        return true;
    }
}