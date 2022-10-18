<?php

class Product extends db_michio{
    public $id;
    public $name;
    public $img;
    public $desc;
    public $price;
    public $id_category;

    public function getAll(){
        $query = "SELECT * FROM tb_product";
        return mysqli_query($this->conn, $query);
    }

    public function getOne($id){
        $query = "SELECT * FROM tb_product WHERE id=$id";
        return mysqli_query($this->conn, $query);
    }
    
}