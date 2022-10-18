<?php
require_once "models/model.php";

class Controller {
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke() {
        if(!isset($_GET["id"])) {
            $products = $this->model->getProductList();
            include "views/productlist.php";
        } else {
            $product = $this->model->getProduct($_GET["id"]);
            include "views/viewproduct.php";
        }
    }
}