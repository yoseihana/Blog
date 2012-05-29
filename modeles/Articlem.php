<?php

class Article extends AbstractModel
{
    const TABLE = 'article';
    const ID = ':id_article';
    const TITRE = 'titre';
    const DATE_PARUTION = 'date_parution';
    const ARTICLE = 'article';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Récupère tous les articles
     * @param $pagination
     * @return array
     */
    function getAllArticles($pagination)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::DATE_PARUTION . ' DESC LIMIT ' . $pagination . ',5';

        return $this->fetchAll($req);
    }

    /**
     * Récupère un article selon son ID
     * @param $id_article
     * @return mixed
     */
    function findArticleById($id_article)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID . ' = :id_article';
        $param = Array(
            ':id_article' => $id_article
        );

        return $this->fetch($req, $param);
    }

    /**
     * Supression d'un article selon son ID
     * @param $id_auteur
     * @return bool
     */
    function deleteArticle($id_auteur)
    {

        $req = 'DELETE FROM a' . self::TABLE . ' WHERE ' . self::ID . '= :id_article';
        $param = Array(
            ':id_article' => self::ID
        );

        return $this->execute($req, $param);
    }

    /**
     * Mise à jour d'un article
     * @param array $data
     * @return bool
     */
    function updateArticle(array $data)
    {

        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::TITRE . '= :titre,' . self::ARTICLE . '= :article WHERE ' . self::ID . '= :id_article';
        $param = Array(
            ':titre'     => $data[self::TITRE],
            ':article'   => $data[self::ARTICLE],
            ':id_article'=> $data[self::ID]
        );
        return $this->execute($req, $param);
    }

    /**
     * Ajout d'un article
     * @param array $data
     * @return bool
     */
    function addArticle(array $data)
    {

        $req = 'INSERT INTO ' . self::ARTICLE . ' VALUES ( null, :titre, :article, :date_parution, 0)';
        $param = Array(
            ':titre'        => $data[self::TITRE],
            ':article'      => $data[self::ARTICLE],
            ':date_parution'=> $data[self::DATE_PARUTION]
        );
        return $this->execute($req, $param);

    }

    /**
     * Compte le nombre d'article a cet ID
     * @param $id_article
     * @return mixed
     */
    function countArticleById($id_article)
    {
        $req = 'SELECT count(' . self::ID . ') AS nb_id_article FROM ' . self::ARTICLE . ' WHERE ' . self::ID . '= :id_article'; // récupère le nbre d'isbn
        $param = Array(
            ':id_article' => $id_article
        );
        $result = $this->fetch($req, $param);
        return $result['nb_id_article']; // retourne 0 ou 1
    }

    function countArticle()
    {
        $req = 'SELECT COUNT(*) AS total FROM ' . self::ARTICLE;
        return $this->fetch($req);
    }
}