<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 29/05/12
 * Time: 15:28
 * To change this template use File | Settings | File Templates.
 */

require_once './controleur/ArticleController.php';
require_once './controleur/CommentaireController.php';
require_once './controleur/CategorieController.php';

abstract class MainController
{
    const DEFAULT_CONTROLLER = 'def_controller';
    const DEFAULT_ACTION = 'def_action';

    private static $lastController;
    private static $lastAction;

    //Routage
    public static function route()
    {
        // Define the controller and the action where route to.
        if (isset($_REQUEST['a']) && isset($_REQUEST['c']))
        {
            self::$lastController = $_REQUEST['c'];
            self::$lastAction = $_REQUEST['a'];
        }
        else
        {
            self::$lastController = constant(self::DEFAULT_CONTROLLER);
            self::$lastAction = constant(self::DEFAULT_ACTION);
        }

        // Get supposed controller class name from controller name
        $lastControllerClass = AbstractController::getClassName(self::$lastController);

        if (!class_exists($lastControllerClass, false))
        {
            die('Aucun controller existe pour "' . self::$lastController . '".');
        }

        //Changement, passe d'un string à un objet instancier de la dernière classe
        $lastControllerClass = new $lastControllerClass;

        // Check if controller class name (above) is a valid controller (extends AbstractController)
        if (!($lastControllerClass instanceof AbstractController))
        {
            die('Pas de controller valide pour "' . self::$lastController . '".');
        }

        // Retrieve all valid action for the given controller
        $availableActions = call_user_func(array(
            $lastControllerClass,
            'getAvailableActions' // Method inherited from AbstractController
        ));

        // Check if requested action is available for the requested controller
        if (!in_array(self::getLastAction(), $availableActions))
        {
            die ('Pas d\'action "' . self::$lastAction . '" pour le controller "' . self::$lastController . '"');
        }

        // Call the requested method from the requested controller  /!\ Trés important!
        return call_user_func(array(
            $lastControllerClass,
            self::$lastAction
        ));
    }

    public static function getLastAction()
    {
        return self::$lastAction;
    }

    public static function getLastController()
    {
        return self::$lastController;
    }

    public static function getLastViewFileName()
    {
        return strtolower(self::$lastAction . self::$lastController . '.php');
    }

}
