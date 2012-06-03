<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 29/05/12
 * Time: 15:38
 * To change this template use File | Settings | File Templates.
 */
require_once 'AbstractModel.php';
final class Written extends AbstractModel
{
    const TABLE = 'ecrire';
    const ID_ARTICLE = 'id_article';
    const ID_CATEGORIE = 'id_categorie';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Supprimer une relation article-categorieà
     * @param $data
     * @return bool
     */
    public function delete(array $data)
    {
        $req = 'DELETE FROM ' . self::TABLE
            . ' WHERE ' . self::ID_ARTICLE . ' =:id_article'
            . ' AND ' . self::ID_CATEGORIE . ' = :id_categorie';

        $param = array(
            ':id_article'  => $data[self::ID_ARTICLE],
            ':id_categorie'=> $data[self::ID_CATEGORIE]
        );

        return $this->execute($req, $param);
    }

    public function deleteAllById($id_categorie)
    {
        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID_CATEGORIE . '= :id_categorie';
        $param = array(
            ':id_categorie'=> $id_categorie
        );

        return self::execute($req, $param);
    }

    public function deleteAllByIdArticle($id_article)
    {
        $req = 'DELETE FROM ' . self::TABLE . ' WHERE ' . self::ID_ARTICLE . ' = :id_article';
        $param = array(
            ':id_article'=> $id_article
        );

        return self::execute($req, $param);
    }

    public function add(array $data)
    {
        $req = 'INSERT INTO ' . self::TABLE . ' VALUES (:id_article, :id_categorie)';
        $param = array(
            'id_article'  => $data[self::ID_ARTICLE],
            'id_categorie'=> $data[self::ID_CATEGORIE]
        );

        return $this->execute($req, $param);
    }

    public function update($id_categorie)
    {
        $req = 'UPDATE ' . self::TABLE .
            'SET ' . self::ID_CATEGORIE . ' =:id_categorie
            WHERE ' . $id_categorie . ' = :id_categorie';
        $param = array(
            ':id_categorie' => $data[self::ID_CATEGORIE]
        );
        return $this->execute($req, $param);
    }
}
