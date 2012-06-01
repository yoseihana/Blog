<?php

require_once 'AbstractController.php';
require_once './modeles/Article.php';
require_once './modeles/Comment.php';

final class CommentaireController extends AbstractController
{

    private $article;
    private $comment;
    private $categorie;

    function __construct()
    {
        $this->article = new Article();
        $this->comment = new Comment();
        $this->categorie = new Categorie();
    }

    public static function getDefaultAction()
    {
        return 'lister';
    }

    public function lister()
    {
        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);

        $data = array(
            'view_title'  => 'Les commentaires',
            'commentaires'=> $this->comment->findCommentByIdArticle($id_article),
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    public function modifier()
    {
        $id_commentaire = $this->getParameter('id_commentaire');
        $this->isIdCommentaireExist($id_commentaire);

        if ($this->isPost())
        {
            $commentaire = array(
                Comment::ID_COMMENTAIRE => $id_commentaire,
                Comment::NOM            => $this->getParameter('nom'),
                Comment::DATE           => date('Y, m, d'),
                Comment::TEXT           => $this->getParameter('text')
            );

            $this->comment->updated($commentaire);

            header('Location: ' . Url::voirArticle($this->getParameter('id_article')));
        }
        elseif ($this->isGet())
        {
            $commentaire = $this->comment->findCommentById($id_commentaire);
            $categorie = $this->categorie->getAll();

            $data = array(
                'view_title' => "Modifier le commentaire de " . $commentaire[Comment::NOM],
                'commentaire'=> $commentaire,
                'categories' => $categorie
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function ajouter()
    {
        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);

        if ($this->isPost())
        {
            $commentaire = array(
                Comment::DATE      => date('Y-m-d'),
                Comment::NOM       => $this->getParameter('nom'),
                Comment::TEXT      => $this->getParameter('text'),
                Comment::ID_ARTICLE=> $id_article
            );

            $nb_commentaire = array(
                Article::NB_COM => $this->getParameter('nb_commentaire') + 1
            );

            DB::getPdoInstance()->beginTransaction();
            $this->comment->add($commentaire);
            $this->article->addUpdateComment($nb_commentaire);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirArticle($this->getParameter('id_article')));

        }
        elseif ($this->isGet())
        {
            $data = array(
                'view_title'=> 'Ajouter un commentaire',
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function supprimer()
    {
        $id_commentaire = $this->getParameter('id_commentaire');
        $this->isIdCommentaireExist($id_commentaire);

        $id_article = $this->getParameter('id_article');
        $this->isIdArticleExist($id_article);

        if ($this->isPost())
        {
            DB::getPdoInstance()->beginTransaction();
            $this->comment->delete($id_commentaire);
            $this->article->deletUpdateComment($id_article);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirArticle($this->getParameter('id_article')));
        }
        elseif ($this->isGet())
        {
            $commentaire = $this->comment->findCommentById($id_commentaire);

            $data = array(
                'view_title' => 'Suppression du commentaire ' . $commentaire,
                'commentaire'=> $commentaire
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    public function isIdArticleExist($id_article)
    {
        if (count($this->article->coutById($id_article) < 1))
        {
            die('L\'id article fourni n\'existe pas dans notre base de donnée');
        }

        return true;
    }

    public function isIdCommentaireExist($id_commentaire)
    {
        if (count($this->comment->countCommentById($id_commentaire)) < 1)
        {
            die('L\'id commentaire fourni n\'existe pas dans notre base de données');
        }
        return true;
    }
}