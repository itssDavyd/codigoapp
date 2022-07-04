<?php

/**
 * 
 * @brief Clase que gestiona la conexion con la base de datos.
 * 
 * <h4> [Description DbdConnect] </h4>
 * <p> En esta clase trabajamos la conexion a nuestra base de datos, asi como su gestion. </p>
 * 
 * @author David Fernandez y Jose Chavez <davi123fragoso@gmail.com>
 * @version 0.1 
 * @since 0.1
 */
class DbdConnect
{

    private $server;
    private $bdd;
    private $user;
    private $passwd;
    private $dbh;

    function __construct($server, $bdd, $user, $passwd)
    {
        $this->server = $server;
        $this->bdd = $bdd;
        $this->user = $user;
        $this->passwd = $passwd;
    }

    /**
     * Abre la conexion con la base de datos.
     * Se podria pasar directamente los parametros por el constructor para ahorrar la llamada a una funcion. (Reduccion de codigo)
     */
    function openConnection()
    {

        try {
            //Data Source Name
            $dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->bdd;
            //Nombre que se usa para el objeto PDO
            $this->dbh = new PDO($dsn, $this->user, $this->passwd);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Cierra la conexion con la base de datos.
     */
    function closeConnection()
    {
        $this->dbh = null;
    }

    /**
     * @param mixed $sql consulta que se almacena para posteriormente pasarla y ejecutarla.
     * 
     * @return array $results donde almacenamos todo el contenido de la consulta realizada a la base de datos.
     */
    function selectAllQuery($sql)
    {
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = [];
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            array_push($results, $fila);
        }
        return $results;
    }
}
