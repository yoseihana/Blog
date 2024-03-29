<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 29/05/12
 * Time: 15:34
 * To change this template use File | Settings | File Templates.
 */
require_once 'AbstractModel.php';

class Comment extends AbstractModel
{
    const TABLE = 'commentaire';
    const ID_COMMENTAIRE = 'id_commentaire';
    const NOM = 'nom_auteur';
    const TEXT = 'texte';
    const DATE = 'date';
    const ID_ARTICLE = 'id_article';

    function __construct()
    {
        parent::__construct();
    }

    public function findCommentByIdArticle($id_article)
    {
        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID_ARTICLE . ' = :id_article';
        $param = array(
            ':id_article'=> $id_article
        );

        return $this->fetchAll($req, $param);
    }

    public function findCommentById($id_commentaire)
    {
        $req = 'SELECT * FROM ' . self::TABLE . ' WHERE ' . self::ID_COMMENTAIRE . ' = :id_commentaire';
        $param = array(
            ':id_commentaire'=> $id_commentaire
        );

        return $this->fetch($req, $param);
    }

    public function deleteByArticle($id_article)
    {
        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID_ARTICLE . ' = :id_article';
        $param = array(
            ':id_article'=> $id_article
        );
        return $this->execute($req, $param);
    }

    public function add(array $data)
    {
        $req = 'INSERT INTO ' . self::TABLE . ' VALUE ( null, :nom_auteur, :texte, :date, :id_article)';
        $param = array(
            ':nom_auteur'=> $data[self::NOM],
            ':texte'     => $data[self::TEXT],
            ':date'      => date('Y-m-d'),
            ':id_article'=> $data[self::ID_ARTICLE]
        );

        return $this->execute($req, $param);

    }

    public function countCommentById($id_commentaire)
    {
        $req = 'SELECT count(' . self::ID_COMMENTAIRE . ') AS nb_id_commentaire FROM ' . self::TABLE . ' WHERE ' . self::ID_COMMENTAIRE . '= :id_commentaire';
        $param = array(
            ':id_commentaire'=> $id_commentaire
        );
        $result = $this->fetch($req, $param);

        return $result['nb_id_commentaire']; // retourne 0 ou 1
    }
}
