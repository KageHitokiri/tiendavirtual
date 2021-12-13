<?php
namespace ProyectoWeb\repository;

use ProyectoWeb\database\QueryBuilder;


class ProductRepository extends QueryBuilder
{
    public function __construct(){
        parent::__construct('productos', 'Product');
    }

    public function getCarrusel():array {
        $sql = "SELECT * FROM $this->table WHERE carrusel IS NOT NULL AND carrusel != ''";
        return $this->executeQuery($sql);
    }

    public function getDestacados(){
        $sql = "SELECT *  FROM $this->table WHERE destacado = 1";
        return $this->executeQuery($sql);
    }

    public function getNovedades(){
        $sql = "SELECT *  FROM $this->table ORDER BY fecha DESC LIMIT 6";
        return $this->executeQuery($sql);
    }
}