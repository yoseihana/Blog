<?php

require_once 'AbstractController.php';
require_once './modeles/Article.php';
require_once './modeles/Categorie.php';
require_once './modeles/Written.php';

final class CategorieController extends AbstractController
{
    private $article;
    private $categorie;
    private $written;

    function __construct()
    {
        $this->article = new Article();
        $this->categorie = new Categorie();
        $this->written = new Written();
    }

    public static function getDefaultAction()
    {
        return 'lister';
    }

    function lister()
    {
        $data['view_title'] = 'Liste des catégories';
        $data['categories'] = $this->categorie->getAll();

        return array('data' => $data, 'html' => MainController::getLastViewFileName());
    }

    function modifier()
    {
        $id_categorie = $this->getParameter('id_categorie');
        $this->isIdExist($id_categorie);

        if ($this->isPost())
        {
            $categorie = array(
                Categorie::ID       => $id_categorie,
                Categorie::TITRE    => $this->getParameter('categorie')
            );

            $ecritDelete = array(
                Written::ID_CATEGORIE => $id_categorie,
                Written::ID_ARTICLE   => $_POST['id_article2']

            );

            $ecritAdd = array(
                Written::ID_CATEGORIE => $id_categorie,
                Written::ID_ARTICLE   => $this->getParameter('id_article')
            );

            DB::getPdoInstance()->beginTransaction();
            $this->categorie->update($categorie);
            $this->written->delete($ecritDelete);
            $this->written->add($ecritAdd);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::voirCategorie($this->getParameter('id_categorie')));

        }
        elseif ($this->isGet())
        {
            $categorie = $this->categorie->findCategorieById($id_categorie);
            $data = array(
                'view_title'=> 'Modification de la catégorie ' . $categorie[Categorie::TITRE],
                'categorie' => $categorie
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    function ajouter()
    {
        if ($this->isPost())
        {
            $categorie = array(
                Categorie::ID       => $this->getParameter('id_categorie'),
                Categorie::TITRE    => $this->getParameter('categorie')
            );

            $this->categorie->add($categorie);

            header('Location: ' . Url::voirCategorie($this->getParameter('id_categorie')));
        }
        elseif ($this->isGet())
        {
            $data = array(
                'view_title'=> 'Ajouter une catégorie'
            );
            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    function supprimer()
    {
        $id_categorie = $this->getParameter('id_categorie');
        $this->isIdExist($id_categorie);

        if ($this->isPost())
        {
            DB::getPdoInstance()->beginTransaction();
            $this->written->deleteAllById($id_categorie);
            $this->categorie->delete($id_categorie);
            DB::getPdoInstance()->commit();

            header('Location: ' . Url::listerCategorie());

        }
        elseif ($this->isGet())
        {
            $categorie = $this->categorie->findCategorieById($id_categorie);
            $data = array(
                'view_title'=> 'Supprimer la catégorie: ' . $categorie[Categorie::TITRE],
                'categorie' => $categorie
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    function voir()
    {
        $id_categorie = $this->getParameter('id_categorie');
        $this->isIdExist($id_categorie);

        $categorie = $this->categorie->findCategorieById($id_categorie);

        $data = array(
            'view_title'  => 'Catégorie ' . $categorie[Categorie::TITRE],
            'categorie'   => $categorie,
            'articles'    => $this->article->findByCategorie($id_categorie),
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    function isIdExist($id_categorie)
    {
        if ($this->categorie->countById($id_categorie) < 1)
        {
            die('L\'id catégorie fourni n\'existe pas dans la base de données');
            //header('Location:index.php?c=error&a=e_404');
        }

        return true;
    }


}
