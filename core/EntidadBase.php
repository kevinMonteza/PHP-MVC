<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntidadBase
 *
 * @author kevinMC
 */
class EntidadBase {

    private $table;
    private $db;
    private $conectar;

    public function __construct($table, $adapter) {
        $this->table = (string) $table;
        $this->conectar = null;
        $this->db = $adapter;
    }

    public function getConectar() {
        return $this->conectar;
    }

    public function db() {
        return $this->db;
    }

    public function getAll() {
        if ($query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC")) {
            while ($row = $query->fetch_object()) {
                $resultSet[] = $row;
            }
        }else{
            echo 'No entro al if';
        }
        return $resultSet;
    }

    public function getById($id) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE ID = $id");
        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }

    public function getBy($column, $value) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column= $value ");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function delete($id) {
        $query = $this->db->query("DELETE FROM $this->table WHERE ID = $id");
        return $query;
    }

    public function deleteBy($column, $value) {
        $query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }

}
