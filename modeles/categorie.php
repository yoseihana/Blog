<?php

function getList()
{
    global $connex;

    $req = 'SELECT * FROM categorie';

    try {
        $res = $connex->query($req);
        $categorie = $res->fetchAll();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $categorie;
}

function getOne($id_categorie)
{
    global $connex;

    $req = 'SELECT * FROM categorie WHERE id_categorie = :id_categorie';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_categorie', $id_categorie);
        $ps->execute();

        $categorie = $ps->fetch();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
    return $categorie;
}

function delete($data)
{

    global $connex;
    $req = 'DELETE FROM categorie WHERE id_categorie = :id_categorie';

    try {
        $ps = $connex->prepare($req);
        $ps->bindValue(':id_categorie', $data['id_categorie']);
        $ps->execute();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

    return true;
}

function update($data)
{

    global $connex;

    $req = 'UPDATE categorie SET id_categorie = :id_categorie, categorie = :categorie WHERE id_categorie = :id_categorie';

    try {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_categorie', $data['id_categorie']);
        $ps->bindValue(':categorie', $data['categorie']);

        $ps->execute();
    }
    catch (PDOException $e) {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;
}

function add()
{


    if (!getidCategorieCount($_POST['id_categorie'])) {
        global $connex;

        $req = 'INSERT INTO categorie VALUES (:id_categorie, :categorie);';
        // $req2 = 'INSERT INTO ecrit VALUES (:isbn, :id_auteur)';


        try {
            $ps = $connex->prepare($req);

            $ps->bindValue(':id_categorie', $_POST['id_categorie']);
            $ps->bindValue(':categorie', $_POST['categorie']);
            $ps->execute();

            /* $ps = $connex->prepare($req2);
              $ps->bindValue(':isbn', $_POST['isbn']);
              $ps->bindValue(':id_auteur', $_POST['id_auteur']);
              $ps->execute(); */
        }
        catch (PDOException $e) {
            die($e->getMessage());
            //header('Location: index.php?c=error&a=e_database');
        }

        return true;
    }
    else {
        return false;
    }
}

function getidCategorieCount($id_categorie)
{
    global $connex; // récupérer la connection
    $req = 'SELECT count(id_categorie) AS nb_id_categorie FROM categorie WHERE id_categorie = :id_categorie'; // récupère le nbre d'isbn

    try {
        $ps = $connex->prepare($req); // connection
        $ps->bindValue(':id_categorie', $id_categorie); //les valeurs sont liées
        $ps->execute(); // execution
    }
    catch (PDOException $e) {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbidCategorie = $ps->fetch();
    $nbidCategorie = $nbidCategorie['nb_id_categorie']; // extraction du nbre de ISBN trouver

    return $nbidCategorie['nb_id_categorie']; // retourne 0 ou 1
}