<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 29/05/12
 * Time: 18:00
 * To change this template use File | Settings | File Templates.
 */
require_once './controleur/ArticleController.php';
require_once './controleur/CategorieController.php';
require_once './controleur/CommentaireController.php';
require_once './controleur/MembreController.php';

final class Url
{
    private static function build($controller, $action, array $params = array())
    {
        $p = array(
            'c'=> $controller,
            'a'=> $action
        );

        return $_SERVER['PHP_SELF'] . '?' . http_build_query(array_merge($p, $params));
    }

    /*------------ARTICLE-------------*/
    public static function listerArticle()
    {
        return Url::build(ArticleController::getName(), 'lister');
    }

    public static function voirArticle($id_article)
    {
        return Url::build(ArticleController::getName(), 'voir', array('id_article'=> $id_article));
    }

    public static function modifierArticle($id_article)
    {
        return Url::build(ArticleController::getName(), 'modifier', array('id_article'=> $id_article));
    }

    public static function supprimerArticle($id_article)
    {
        return Url::build(ArticleController::getName(), 'supprimer', array('id_article'=> $id_article));
    }

    public static function ajouterArticle()
    {
        return Url::build(ArticleController::getName(), 'ajouter');
    }

    /*----------------CATEGORIE--------------*/
    public static function listerCategorie()
    {
        return Url::build(CategorieController::getName(), 'lister');
    }

    public static function voirCategorie($id_categorie)
    {
        return Url::build(CategorieController::getName(), 'voir', array('id_categorie'=> $id_categorie));
    }

    public static function modifierCategorie($id_categorie)
    {
        return Url::build(CategorieController::getName(), 'modifier', array('id_categorie'=> $id_categorie));
    }

    public static function supprimerCategorie($id_categorie)
    {
        return Url::build(CategorieController::getName(), 'supprimer', array('id_categorie'=> $id_categorie));
    }

    public static function ajouterCategorie()
    {
        return Url::build(CategorieController::getName(), 'ajouter');
    }

    /*---------------COMMENTAIRE--------------*/
    public static function voirCommentaire($id_article)
    {
        return Url::build(ArticleController::getName(), 'voir', array('id_article' => $id_article)) . '#ancreCommentaire';
    }

    public static function ajouterCommentaire($id_article)
    {
        return Url::build(CommentaireController::getName(), 'ajouter', array('id_article'=> $id_article)) . '#ajouterComment';
    }

    public static function supprimerCommentaire($id_commentaire)
    {
        return Url::build(CommentaireController::getName(), 'supprimer', array('id_commentaire'=> $id_commentaire));
    }

    public static function modifierCommentaire($id_commentaire)
    {
        return Url::build(CommentaireController::getName(), 'modifier', array('id_commentaire'=> $id_commentaire));
    }

    public static function connexionMembre()
    {
        return Url::build(MembreController::getName(), 'connexion');
    }

    public static function deconnexionMembre()
    {
        return Url::build(MembreController::getName(), 'deconnexion');
    }
}
