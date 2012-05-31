<?php

require_once 'AbstractModel.php';

class Article extends AbstractModel
{
    const TABLE = 'article';
    const ID = 'id_article';
    const TITRE = 'titre';
    const DATE_PARUTION = 'date_parution';
    const ARTICLE = 'article';
    const NB_COM = 'nb_commentaire';
    const IMAGE = 'image';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Récupère tous les articles
     * @param $pagination
     * @return array
     */
    public function getAll($pagination)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' ORDER BY ' . self::DATE_PARUTION . ' DESC LIMIT ' . $pagination . ',5';

        return $this->fetchAll($req);
    }

    /**
     * Récupère un article selon son ID
     * @param $id_article
     * @return mixed
     */
    public function findArticleById($id_article)
    {

        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID . ' = :id_article';
        $param = Array(
            ':id_article' => $id_article
        );

        return $this->fetch($req, $param);
    }

    public function findByCategorie($id_categorie)
    {
        $req = 'SELECT a.* FROM ' . self::TABLE . ' as a JOIN '
            . Written::TABLE . ' as e ON a.' . self::ID . ' = e.'
            . Written::ID_ARTICLE . ' WHERE e.'
            . Written::ID_CATEGORIE . ' = :id_categorie';

        $param = array(
            ':id_categorie'=> $id_categorie
        );

        return $this->fetchAll($req, $param);
    }

    /**
     * Supression d'un article selon son ID
     * @param $id_auteur
     * @return bool
     */
    public function delete($id_auteur)
    {

        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID . '= :id_article';
        $param = Array(
            ':id_article' => $id_auteur
        );

        return $this->execute($req, $param);
    }

    /**
     * Mise à jour d'un article
     * @param array $data
     * @return bool
     */
    public function update(array $data)
    {

        $req = 'UPDATE ' . self::TABLE . ' SET '
            . self::TITRE . '= :titre, '
            . self::ARTICLE . '= :article, '
            . self::DATE_PARUTION . ' =:date_parution, '
            . self::IMAGE . ' =:image WHERE ' . self::ID . '= :id_article';
        $param = Array(
            ':titre'         => $data[self::TITRE],
            ':article'       => $data[self::ARTICLE],
            ':id_article'    => $data[self::ID],
            ':date_parution' => $data[self::DATE_PARUTION],
            ':image'         => $data[self::IMAGE]
        );
        return $this->execute($req, $param);
    }

    public function addUpdateComment(array $data)
    {
        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::NB_COM . ' = :nb_commentaire + 1 WHERE ' . self::ID . ' = :id_article';
        $param = array(
            ':nb_commentaire' => $data[self::NB_COM],
            ':id_article'     => $data[self::ID]
        );

        return $this->execute($req, $param);
    }

    public function deletUpdateComment(array $data)
    {
        $req = 'UPDATE ' . self::TABLE . ' SET ' . self::NB_COM . ' = :nb_commentaire - 1 WHERE ' . self::ID . ' = :id_article';
        $param = array(
            ':nb_commentaire' => $data[self::NB_COM],
            ':id_article'     => $data[self::ID]
        );

        return $this->execute($req, $param);
    }

    /**
     * Ajout d'un article
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        $req = 'INSERT INTO ' . self::ARTICLE . ' VALUES ( null, :titre, :article, :date_parution, 0 , :image)';
        $param = Array(
            ':titre'        => $data[self::TITRE],
            ':article'      => $data[self::ARTICLE],
            ':date_parution'=> $data[self::DATE_PARUTION],
            ':image'        => $data[self::IMAGE],
        );


        return $this->execute($req, $param);

    }

    /**
     * Compte le nombre d'article a cet ID
     * @param $id_article
     * @return mixed
     */
    public function coutById($id_article)
    {
        $req = 'SELECT count(' . self::ID . ') AS nb_id_article FROM ' . self::ARTICLE . ' WHERE ' . self::ID . '= :id_article'; // récupère le nbre d'isbn
        $param = Array(
            ':id_article' => $id_article
        );
        $result = $this->fetch($req, $param);
        return $result['nb_id_article']; // retourne 0 ou 1
    }

    public function countArticle()
    {
        $req = 'SELECT COUNT(*) AS total FROM ' . self::ARTICLE;
        $totaleArticles = $this->fetch($req);

        return $totaleArticles;
    }
}