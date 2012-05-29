<?php
/**
 * Created by JetBrains PhpStorm.
 * User: annabelle
 * Date: 21/05/12
 * Time: 18:03
 * To change this template use File | Settings | File Templates.
 */

require_once'./config/DB.php';

class AbstractModel
{
    protected $connection;

    function __construct()
    {
        $this->connection =& DB::getPdoInstance();
    }

    /**
     * Préparation et exécution d'un PDOStatement
     * @param $request
     * @param array|null $parametres
     * @return bool
     */
    protected function execute($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            return $statement->execute($parametres);
        }
        catch (PDOException $e)
        {
            $this->_PDOGestionException($e);
        }
    }

    /**
     * Prépare, execute et collecte les résultats
     * @param $request
     * @param array|null $parametres
     * @return array
     */
    protected function fetchAll($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            $statement->execute($parametres);
            return $statement->fetchAll();
        }
        catch (PDOException $e)
        {
            $this->_PDOGestionException($e);
        }
    }

    /** Prépare, excéute et collecte le résultat
     * @param $request
     * @param array|null $parametres
     * @return mixed
     */
    protected function fetch($request, array $parametres = NULL)
    {
        try
        {
            $statement = $this->connection->prepare($request);
            $statement->execute($parametres);
            return $statement->fetch();
        }
        catch (PDOException $e)
        {
            $this->_PDOGestionException($e);
        }
    }

    /**
     * Comment le PDOException sera géré
     * @param PDOException $e
     */
    private function _PDOGestionException(PDOException $e)
    {
        //Annulation de la transaction si il y en a une
        if ($this->connection()->inTransaction())
        {
            $this->connection->rollBack();
        }
        die($e->getMessage());
    }
}
