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
require_once './modeles/Categorie.php';

final class ArticleController extends AbstractController
{
    private $article;
    private $comment;
    private $categorie;
    private $written;

    function __construct()
    {
        $this->article = new Article();
        $this->categorie = new Categorie();
        $this->comment = new Comment();
        $this->written = new Written();
    }

    public static function getDefaultAction()
    {
        return 'lister';
    }

    public function lister()
    {
        $totaleArticles = $this->article->countArticle();
        $nombrePages = ceil($totaleArticles['total'] / 10);

        if (isset($_GET['page']))
        {
            $pageActuelle = intval($_GET['page']);

            if ($pageActuelle > $nombrePages)
            {
                $pageActuelle = $nombrePages;
            }
        }
        else
        {
            $pageActuelle = 1;
        }

        $premiereEntree = ($pageActuelle - 1) * 10;

        $data = array(
            'view_title' => 'Tous les articles',
            'articles'   => $this->article->getAll($premiereEntree),
            'categories' => $this->categorie->getAllCategorie(),
            'nbPage'     => $nombrePages,

        );
        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    public function voir()
    {
        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);
        $article = $this->article->findArticleById($id_article);

        $data = array(
            'view_title'  => $article[Article::TITRE],
            'article'     => $article,
            'categories'  => $this->categorie->getAllCategorie(),
            'commentaires'=> $this->comment->findCommentByIdArticle($id_article),
            'categorie'   => $this->categorie->findByArticle($id_article)
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    public function modifier()
    {
        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);

        if ($this->isPost())
        {
            $article = array(
                Article::TITRE        => $this->getParameter('titre'),
                Article::ARTICLE      => $this->getParameter('article'),
                Article::DATE_PARUTION=> date('Y-m-d'),
                Article::IMAGE        => NULL,
                Article::ID           => $this->getParameter('id_article')
            );

            $ecritDelete = array(
                Written::ID_ARTICLE   => $id_article,
                Written::ID_CATEGORIE => $_POST['id_categorie']
            );

            $ecritAdd = array(
                Written::ID_ARTICLE   => $id_article,
                Written::ID_CATEGORIE => $this->getParameter('id_categorie')
            );

            DB::getPdoInstance()->beginTransaction();
            $this->article->update($article);
            $this->written->delete($ecritDelete);
            $this->written->add($ecritAdd);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirArticle($this->getParameter('id_article')));

        }
        elseif ($this->isGet())
        {
            $article = $this->article->findArticleById($id_article);
            $categorie = $this->categorie->getAllCategorie();
            $data = array(
                'view_title' => 'Modification de l\'article "' . $article[Article::TITRE],
                'article'    => $article,
                'categories' => $categorie
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function ajouter()
    {
        if ($this->isPost())
        {
            DB::getPdoInstance()->beginTransaction();

            $article = array(
                Article::DATE_PARUTION => date('Y-m-d'),
                Article::TITRE         => $this->getParameter('titre'),
                Article::ARTICLE       => $this->getParameter('article'),
                Article::IMAGE         => NULL
            );
            $new_id_article = $this->article->add($article);

            $ecrit = array(
                Written::ID_ARTICLE   => $new_id_article,
                Written::ID_CATEGORIE => $this->getParameter('id_categorie')
            );
            $this->written->add($ecrit);

            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirArticle($new_id_article));
        }
        elseif ($this->isGet())
        {
            $data = array(
                'view_title' => 'Ajouter un article',
                'categories' => $this->categorie->getAllCategorie(),
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function supprimer()
    {
        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);

        if ($this->isPost())
        {
            DB::getPdoInstance()->beginTransaction();
            $this->comment->deleteByArticle($id_article);
            $this->article->delete($id_article);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::listerArticle());
        }
        elseif ($this->isGet())
        {
            $article = $this->article->findArticleById($id_article);
            $categorie = $this->categorie->getAllCategorie();

            $data = array(
                'view_title'  => 'Supprimer l\'article: ' . $article[Article::TITRE],
                'article'     => $article,
                'categories'  => $categorie
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    private function isIdArticleExist($id_article)
    {
        if ($this->article->countById($id_article) < 1)
        {
            die('L\'id "' . $id_article . '" n\'existe pas dans la base de données');
        }

        return true;
    }
}

