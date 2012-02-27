<?php

include 'modeles/' . $c . '.php';

function lister()
{
    global $a, $c;

    $data['view_title'] = 'Liste des catégories';
    $data['categories'] = getList();
    $html = $a . $c . '.php';
    return array('data' => $data, 'html' => $html);
}

function modifier()
{
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_categorie'])) {
        $id_categorie = $_REQUEST['id_categorie'];
        if (!_idCategorieExiste($id_categorie)) {
            die('l\'id categorie fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else
    {
        die('vous devez fournir un id categorie pour voir la catégorie');
        //header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $champsCategorie['categorie'] = $_POST['categorie'];
        $champsCategorie['id_categorie'] = $id_categorie;

        update($champsCategorie);

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['lister'] . '&c=' . $validEntities['categorie'] . '&id_categorie=' . $id_categorie);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $data['categorie'] = getOne($id_categorie);
        $data['view_title'] = 'Modification de la catégorie: ' . $data['categorie']['categorie'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }


}

function ajouter()
{
    global $a, $c, $validActions, $validEntities;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        add();

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['lister'] . '&c=' . $validEntities['categorie'] . '&id_categorie=' . $id_categorie);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {


        $data['view_title'] = 'Ajout de catégorie: ';
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }
}

function supprimer()
{
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_categorie'])) {
        $id_categorie = $_REQUEST['id_categorie'];
        if (!_idCategorieExiste($id_categorie)) {
            header('Location:index.php?c=error&a=e_404');
        }
    }
    else
    {
        header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        delete($id_categorie);

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['lister'] . '&c=' . $validEntities['categorie'] . '&id_categorie=' . $id_categorie);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $data['categorie'] = getOne($id_categorie);
        $data['view_title'] = 'Supression de la catégorie: ' . $data['categorie']['categorie'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }


}

function voir()
{
    global $a, $c;

    if (isset($_GET['id_categorie'])) {

        $id_categorie = $_GET['id_categorie'];

        if (!_idCategorieExiste($id_categorie)) {
            die('l\'id categorie fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else {
        die('vous devez fournir un id categorie pour voir la catégorie');
        //header('Location:index.php?c=error&a=e_404');
    }

    $data['categories'] = getList();
    $data['categorie'] = getOne($id_categorie);
    $data['view_title'] = 'La catégorie ' . $data['categorie']['categorie'];
    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _idCategorieExiste($id_categorie)
{
    if (!getidCategorieCount($id_categorie)) {
        return false;
    }
    else {
        return true;
    }
}