<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 3/06/12
 * Time: 19:58
 * To change this template use File | Settings | File Templates.
 */
require_once 'AbstractController.php';
require_once 'CategorieController.php';

final class ErreurController extends AbstractController
{
    private $categorie;

    function __construct()
    {
        $this->categorie = new Categorie();
    }

    public static function getDefaultAction()
    {
        return 'erreurDefaut';
    }

    public function erreurDefaut()
    {
        $data = array(
            'view_title'  => 'Erreur',
            'message'     => 'Une erreur est survenue pour votre demande',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurLogin()
    {
        $data = array(
            'view_title'  => 'Erreur dans le login',
            'message'     => 'Mot de passe ou identifiant inconnu',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurAction()
    {
        $data = array(
            'view_title'  => 'Erreur dans l\'action',
            'message'     => 'Il n\'y a pas d\'action connu pour ce controlleur.',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurController()
    {
        $data = array(
            'view_title'  => 'Erreur dans le controlleur',
            'message'     => 'Il n\'y a pas de controlleur connue pour cette demande.',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurControllerExiste()
    {
        $data = array(
            'view_title'  => 'Erreur du controlleur',
            'message'     => 'Le controlleur demander n\'existe pas',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurParam()
    {
        $data = array(
            'view_title'  => 'Erreur des paramètres',
            'message'     => 'Un paramètre est manquant pour l\'action et le controlleur demander.',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurId()
    {
        $data = array(
            'view_title'  => 'Erreur de l\'id',
            'message'     => 'L\'id fourni n\'existe pas dans notre base de donnée',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurCreationImage()
    {
        $data = array(
            'view_title'  => 'Erreur de création d\'image',
            'message'     => 'Une erreur est survenue lors du redimensionnement de l\'image',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurCopieImage()
    {
        $data = array(
            'view_title'  => 'Erreur copie d\'image',
            'message'     => 'Une erreur est survenue lors de la copie de l\'image',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurFichier()
    {
        $data = array(
            'view_title'  => 'Erreur du fichier',
            'message'     => 'Il n\'y a pas de fichier pour cette demande',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html' => 'erreur.php');
    }

    public function erreurExtention()
    {
        $data = array(
            'view_title'  => 'Erreur dans l\'extention',
            'message'     => 'Le fichier fournit ne correspond pas au type de fichier demander. Veuillez charger des "png", "jpg", "gif", "jpeg" uniquement',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurTaille()
    {
        $data = array(
            'view_title'  => 'Fichier trop lourd',
            'message'     => 'Le fichier envoyer est trop lourd. La capacité maximum supportée est de 50Mo',
            'categories'  => $this->categorie->getAllCategorie()
        );
        return array('data'=> $data, 'html'=> 'erreur.php');
    }

    public function erreurChargement()
    {
        $data = array(
            'view_title'  => 'Erreur dans le chargement',
            'message'     => 'Une erreur est survenue lors du chargement de l\'image dans la base de donnée',
            'categories'  => $this->categorie->getAllCategorie()
        );

        return array('data'=> $data, 'html'=> 'erreur.php');
    }
}

