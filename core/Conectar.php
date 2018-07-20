<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Conexion a la base de datos utilizando el driver mysqli
 *
 * @author kevinMC
 */
class Conectar {

    private $driver;
    private $host, $user, $pass, $database, $charset;

    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver = $db_cfg['driver'];
        $this->host = $db_cfg['host'];
        $this->database = $db_cfg['database'];
        $this->user = $db_cfg['user'];
        $this->pass = $db_cfg['pass'];
        $this->charset = $db_cfg['charset'];
    }

    public function conexion() {

        if ($this->driver == 'mysql' || $this->driver == NULL) {
            $con = new mysqli($this->host, $this->user, $this->pass, $this->database);
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }
            $con->query("SET NAMES '" . $this->charset . "'");
            
        }
        return $con;
    }

    public function startFluent() {
        require_once "FluentPDO/FluentPDO.php";

        if ($this->driver == "mysql" || $this->driver == null) {
            $pdo = new PDO($this->driver . ":dbname=" . $this->database, $this->user, $this->pass);
            $fpdo = new FluentPDO($pdo);
        }

        return $fpdo;
    }

}
