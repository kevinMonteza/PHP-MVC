<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloBase
 *
 * @author kevinMC
 */
class ModeloBase extends EntidadBase{
    //put your code here
    private $table;
    private $fluent;
    
    public function __construct($table,$adapter) {
        $this->table=$table;
        parent::__construct($table,$adapter);
        
        $this->fluent = $this->getConectar()->getFluent();
        
    }
    
    public function fluent(){
        return $this->fluent;
    }
    
    public function ejecutarSql($query){
        $query =$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
         
        return $resultSet;
    }
    
    
}
