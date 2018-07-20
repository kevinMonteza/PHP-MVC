<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorBase
 *
 * @author kevinMC
 */
class ControladorBase {
    public function __construct() {
        require_once 'Conectar.php';
            require_once 'EntidadBase.php';
            require_once 'ModeloBase.php';
        
        
        foreach (glob('model/*.php') as $file){
            require_once $file;
        }
        
       
    }
     public function view($vista,$datos){
         foreach ($datos as $id_assoc => $valor){
             ${$id_assoc}=$valor;
         }
         
         require_once 'core/AyudaVistas.php';
         $helper = new AyudaVistas();
         
         require_once 'view/'.$vista.'View.php';
         
        }
        
        public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
             header("Location:index.php?controller=".$controlador."&action=".$accion);
        }
}

