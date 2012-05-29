<?php

class Categorie extends AbstractModel
{
    const TABEL = 'categorie';
    const ID = 'id_categorie';
    const CATEGORIE = 'categorie';

    function __construct()
    {
        parent::__construct();
    }

    function getAllCategories()
    {
        $req = 'SELECT * FROM ' . self::TABEL . ' ORDER BY ' . self::CATEGORIE;
        return $this->fetchAll($req);
    }

    function findCategorieById($id_categorie)
    {

        $req = 'SELECT * FROM ' . self::TABEL . ' WHERE ' . self::ID . ' = :id_categorie';
        return $this->fetch($req);
    }

    function deleteCategorie($id_categorie)
    {
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

    function updateCategorie(array $data)
    {
        $req = 'UPDATE ' . self::TABEL . ' SET ' . self::ID . '= :id_categorie, ' . self::CATEGORIE . '= :categorie WHERE ' . self::ID . '= :id_categorie';
        $param = array(
            ':id_categorie'=> $data[self::ID],
            ':categore'    => $data[self::CATEGORIE]
        );
        return $this->execute($req, $param);
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
}