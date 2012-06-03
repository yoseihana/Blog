<?php

class Categorie extends AbstractModel
{
    const TABLE = 'categorie';
    const ID = 'id_categorie';
    const TITRE = 'titre';

    function __construct()
    {
        parent::__construct();
    }

    public function getAll($pagination)
    {
        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::TITRE . ' DESC LIMIT ' . $pagination . ',5';
        return $this->fetchAll($req);
    }

    public function getAllCategorie()
    {
        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::TITRE;
        return $this->fetchAll($req);
    }

    public function findCategorieById($id_categorie)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID . ' = :id_categorie';
        $param = array(
            ':id_categorie'=> $id_categorie
        );
        return $this->fetch($req, $param);
    }

    public function findByArticle($id_article)
    {
        $req = 'SELECT c.* FROM ' . self::TABLE . ' as c
                JOIN ' . Written::TABLE . ' as e
                ON c.' . self::ID . ' = e.' . Written::ID_CATEGORIE . '
                WHERE e.' . Written::ID_ARTICLE . ' = :id_article';

        $param = array(
            ':id_article'=> $id_article
        );

        return $this->fetch($req, $param);
    }

    public function delete($id_categorie)
    {
        $req = 'DELETE FROM ' . self::TABLE . ' WHERE '
            . self::ID . '= :id_categorie';
        $param = array(
            'id_categorie' => $id_categorie
        );
        return $this->execute($req, $param);
    }

    public function update(array $data)
    {
        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::ID . '= :id_categorie, ' . self::TITRE . '= :categorie WHERE ' . self::ID . '= :id_categorie';
        $param = array(
            ':id_categorie' => $data[self::ID],
            ':categorie'    => $data[self::TITRE]
        );
        return $this->execute($req, $param);
    }

    public function add(array $data)
    {
        $req = 'INSERT INTO ' . self::TABLE . ' VALUES ( :id_categorie, :categorie)';
        $param = array(
            ':id_categorie'=> $data[self::ID],
            ':categorie'   => $data[self::TITRE]
        );


        return $this->execute($req, $param);

    }

    public function countById($id_categorie)
    {
        $req = 'SELECT count(' . self::ID . ') AS nb_id_categorie FROM ' . self::TABLE . ' WHERE ' . self::ID . ' = :id_categorie'; // récupère le nbre d'isbn
        $param = array(
            'id_categorie'=> $id_categorie
        );
        $resultat = $this->fetch($req, $param);

        return $resultat['nb_id_categorie']; // retourne 0 ou 1
    }

    public function countCategorie()
    {
        $req = 'SELECT COUNT(*) AS total FROM ' . self::TABLE;
        $totaleCategories = $this->fetch($req);

        return $totaleCategories;
    }
}