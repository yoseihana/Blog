<?php

include 'modeles/' . $c . '.php';

function lister()
{
    global $a, $c;

    $data['view_title'] = 'Liste des articles';
    $data['articles'] = getList();
    $html = $a . $c . '.php';


    $data['view_title'] = 'Liste des commentaires';
    $data['commentaires'] = getList();
    $html = $a . $c . '.php';
    return array('data' => $data, 'html' => $html);

}

function modifier()
{
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_commentaire'])) {
        $id_commentaire = $_REQUEST['id_commentaire'];
        if (!_idCommentaireExiste($id_commentaire)) {
            die('l\'id commentaire fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else
    {
        die('vous devez fournir un id commentaire pour voir le commentaire');
        //header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $champsCommentaire['nom_auteur'] = $_POST['nom_auteur'];
        $champsCommentaire['texte'] = $_POST['texte'];
        $champsCommentaire['id_commentaire'] = $id_commentaire;

        update($champsCommentaire);

        header('Location:' . $_SERVER['PHP_SELF'] . '?a=' . $validActions['lister'] . '&c=' . $validEntities['commentaire']);
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
    {

        $data['commentaire'] = getOne($id_commentaire);
        $data['view_title'] = 'Modification du commentaire: ' . $data['commentaire']['nom_auteur'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }


}

function ajouter()
{
    global $a, $c, $validActions, $validEntities;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        add();

        header('Location:' . $_SERVER['PHP_SELF']); // donne la page index.php qui est par défaut
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {


        $data['view_title'] = 'Ajout de commentaire: ';
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html); // returne
    }
}

function supprimer()
{
    global $a, $c, $validActions, $validEntities;

    if (isset($_REQUEST['id_commentaire'])) {
        $id_commentaire = $_REQUEST['id_commentaire'];
        if (!_idCommentaireExiste($id_commentaire)) {
            header('Location:index.php?c=error&a=e_404');
        }
    }
    else {
        header('Location:index.php?c=error&a=e_404');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        delete($id_commentaire);

        header('Location:' . $_SERVER['PHP_SELF']); // donne la page index.php qui est par défaut
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $data['commentaire'] = getOne($id_commentaire);
        $data['view_title'] = 'Supression du commentaire: ' . $data['commentaire']['nom_auteur'];
        $html = $a . $c . '.php';

        return array('data' => $data, 'html' => $html);
    }
}

function voir()
{
    global $a, $c;

    if (isset($_GET['id_commentaire'])) {
        $id_commentaire = $_GET['id_commentaire'];
        if (!_idCommentaireExiste($id_commentaire)) {
            die('l\'id commentaire fournit n\'existe pas dans la base de donnée!');
            //header('Location:index.php?c=error&a=e_404');
        }
    }
    else {
        die('vous devez fournir un id_commenatire pour voir le commentaire');
        //header('Location:index.php?c=error&a=e_404');
    }

    $data['commentaires'] = getList();
    $data['commentaire'] = getOne($id_commentaire);
    $html = $a . $c . '.php';

    return array('data' => $data, 'html' => $html);
}

function _idCommentaireExiste($id_commentaire)
{
    if (!getidCommentaireCount($id_commentaire)) {
        return false;
    }
    else {
        return true;
    }
}