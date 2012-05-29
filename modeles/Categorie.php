<?php

class Categorie extends AbstractModel
{
    const TABLE = 'categorie';
    const ID = 'id_categorie';
    const CATEGORIE = 'categorie';

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::CATEGORIE;
        return $this->fetchAll($req);
    }

    function findCategorieById($id_categorie)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID . ' = :id_categorie';
        $param = array(
            ':id_categorie'=> $id_categorie
        );
        return $this->fetch($req, $param);
    }

    function delete($id_categorie)
    {
        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id_categorie';
        $param = array(
            'id_categorie' => $id_categorie
        );
        return $this->execute($req, $param);
    }

    function update(array $data)
    {
        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::ID . '= :id_categorie, ' . self::CATEGORIE . '= :categorie WHERE ' . self::ID . '= :id_categorie';
        $param = array(
            ':id_categorie'=> $data[self::ID],
            ':categore'    => $data[self::CATEGORIE]
        );
        return $this->execute($req, $param);
    }

    function add(array $data)
    {
        $req = 'INSERT INTO ' . self::TABLE . ' VALUES ( :id_categorie, :categorie)';
        $param = array(
            ':id_categorie'=> $data[self::ID],
            ':categorie'   => $data[self::CATEGORIE]
        );
        return $this->execute($req, $param);

    }

    function countCategorieById($id_categorie)
    {
        $req = 'SELECT count(' . self::ID . ') AS nb_id_categorie FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id_categorie'; // récupère le nbre d'isbn
        $param = array(
            'id_categorie'=> $id_categorie
        );
        $resultat = $this->fetch($req, $param);

        return $resultat['nb_id_categorie']; // retourne 0 ou 1
    }
}