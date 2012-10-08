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


        $totaleCategorie = $this->categorie->countCategorie();
        $nombrePages = ceil($totaleCategorie['total'] / 5);

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

        $premiereEntree = ($pageActuelle - 1) * 5;

        $data = array(
            'view_title' => 'Liste des catégories',
            'categories' => $this->categorie->getAll($premiereEntree),
            'nbPage'     => $nombrePages
        );

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
                Categorie::TITRE    => $this->getParameter('categorie'),
            );

            $this->categorie->update($categorie);

            header('Location: ' . Url::voirCategorie($this->getParameter('id_categorie')));

        }
        elseif ($this->isGet())
        {
            $categorie = $this->categorie->findCategorieById($id_categorie);

            $data = array(
                'view_title' => 'Modification de la catégorie ' . $categorie[Categorie::TITRE],
                'categorie'  => $categorie,
                'categories' => $this->categorie->getAllCategorie()
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
            $categorie = $this->categorie->getAllCategorie();
            $data = array(
                'view_title'=> 'Ajouter une catégorie',
                'categories'=> $categorie
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
                'categorie' => $categorie,
                'categories'=> $this->categorie->getAllCategorie()
            );

            return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
        }
    }

    function voir()
    {
        $id_categorie = $this->getParameter('id_categorie');
        $this->isIdExist($id_categorie);

        $categorie = $this->categorie->findCategorieById($id_categorie);
        $categories = $this->categorie->getAllCategorie();

        $data = array(
            'view_title'  => 'Catégorie ' . $categorie[Categorie::TITRE],
            'categorie'   => $categorie,
            'articles'    => $this->article->findByCategorie($id_categorie),
            'categories'  => $categories
        );

        return array('data'=> $data, 'html'=> MainController::getLastViewFileName());
    }

    function isIdExist($id_categorie)
    {
        if ($this->categorie->countById($id_categorie) < 1)
        {
            Erreur::erreurId();
        }

        return true;
    }


}
