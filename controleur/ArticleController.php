<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 29/05/12
 * Time: 15:31
 * To change this template use File | Settings | File Templates.
 */
require_once 'AbstractController.php';
require_once './modeles/Article.php';
require_once './modeles/Comment.php';
require_once './modeles/Categorie.pjp';

final class ArticleController extends AbstractController
{
    private $article;
    private $comment;
    private $categorie;

    function __construct()
    {
        $this->article = new Article();
        $this->categorie = new Categorie();
        $this->comment = new Comment();
    }

    public static function getDefaultAction()
    {
        return 'lister';
    }

    public function lister()
    {
        $data = array(
            'view_title'=> 'Tous les articles',
            'articles'  => $this->article->getAllArticles($pagination);
    )
        ;
    }
}
