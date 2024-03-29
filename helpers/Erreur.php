<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 3/06/12
 * Time: 19:58
 * To change this template use File | Settings | File Templates.
 */
require_once './controleur/ErreurController.php';

final class Erreur
{
    private static function build($action, array $param = array())
    {
        $p = array(
            'c'=> ErreurController::getName(),
            'a'=> $action,
        );

        header('Location: ' . $_SERVER['PHP_SELF'] . '?' . http_build_query(array_merge($p, $param)));
    }

    public static function erreurLogin()
    {

        return Erreur::build('erreurLogin');
    }

    public static function erreurAction()
    {

        return Erreur::build('erreurAction');
    }

    public static function erreurController()
    {
        return Erreur::build('erreurController');
    }

    public static function erreurControllerExiste()
    {
        return Erreur::build('erreurControllerExiste');
    }

    public static function erreurDefaut()
    {
        return Erreur::build('erreurDefaut');
    }

    public static function erreurParam()
    {
        return Erreur::build('erreurParam');
    }

    public static function erreurId()
    {
        return Erreur::build(('erreurId'));
    }

    public static function erreurCopieImage()
    {
        return Erreur::build('erreurCopie');
    }

    public static function erreurCreationImage()
    {
        return Erreur::build('erreurCreation');
    }

    public static function erreurFichier()
    {
        return Erreur::build('erreurFichier');
    }

    public static function erreurExtention()
    {
        return Erreur::build('erreurExtention');
    }

    public static function erreurTaille()
    {
        return Erreur::build('erreurTaille');
    }

    public static function  erreurChargement()
    {
        return Erreur::build('erreurChargement');
    }
}