<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioModel
 *
 * @author kevinMC
 */
class UsuariosModel extends ModeloBase{
    private $table;
     
    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }
     
    //Metodos de consulta
    public function getUnUsuario(){
        $query="SELECT * FROM usuarios WHERE nombre='Jorge'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
}
