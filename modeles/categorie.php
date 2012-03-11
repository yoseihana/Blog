<?php

function getAllCategories()
{
    global $connex;

    $req = 'SELECT * FROM categorie ORDER BY categorie';

    try
    {
        $res = $connex->query($req);
        $categories = $res->fetchAll();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $categories;
}

function findCategorieById($id_categorie)
{
    global $connex;

    $req = 'SELECT * FROM categorie WHERE id_categorie = :id_categorie';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_categorie', $id_categorie);
        $ps->execute();

        $categorie = $ps->fetch();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
    return $categorie;
}

function deleteCategorie($id_categorie)
{
    global $connex;

    $req1 = 'DELETE FROM lien WHERE id_categorie = :id_categorie';
    $req2 = 'DELETE FROM categorie WHERE id_categorie = :id_categorie';

    try
    {
        $connex->beginTransaction();

        $ps = $connex->prepare($req1);
        $ps->bindValue(':id_categorie', $id_categorie);
        $ps->execute();

        $ps = $connex->prepare($req2);
        $ps->bindValue(':id_categorie', $id_categorie);
        $ps->execute();

        $connex->commit();
    }
    catch (PDOException $e)
    {
        $connex->rollBack();
        die($e->getMessage());
    }

    return true;
}

function updateCategorie($data)
{

    global $connex;

    $req = 'UPDATE categorie SET id_categorie = :id_categorie, categorie = :categorie WHERE id_categorie = :id_categorie';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_categorie', $data['categorie']['id_categorie']);
        $ps->bindValue(':categorie', $data['categorie']['categorie']);

        $ps->execute();
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;
}

function addCategorie($data)
{

    global $connex;

    $req = 'INSERT INTO categorie VALUES ( :id_categorie, :categorie)';

    try
    {
        $ps = $connex->prepare($req);

        $ps->bindValue(':id_categorie', $data['categorie']['id_categorie']);
        $ps->bindValue(':categorie', $data['categorie']['categorie']);
        $ps->execute();

    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header('Location: index.php?c=error&a=e_database');
    }

    return true;

}

function countCategorieById($id_categorie)
{
    global $connex; // récupérer la connection
    $req = 'SELECT count(id_categorie) AS nb_id_categorie FROM categorie WHERE id_categorie = :id_categorie'; // récupère le nbre d'isbn

    try
    {
        $ps = $connex->prepare($req); // connection
        $ps->bindValue(':id_categorie', $id_categorie); //les valeurs sont liées
        $ps->execute(); // execution
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
        //header ('Location: index.php?c=error&a=e_database');
    }

    $nbIdCategorie = $ps->fetch();

    return $nbIdCategorie['nb_id_categorie']; // retourne 0 ou 1
}