<?php
require_once "models/model.php";

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function invoke()
    {
        if (!isset($_GET["id"])) {
            $index = 0;

            if (isset($_GET['category'])) {
                $categories = [$this->model->getCategory($_GET['category'])];
                $products = [$this->model->getProductListByCategory($_GET['category'])];
            } else {
                $categories = $this->model->getCategoryList();
                $products = array();
                foreach ($categories as $category) {
                    $temp = $this->model->getProductListByCategory($category->getId());
                    array_push($products, $temp);
                }
            }
        } else {
            $index = 1;
            $product = $this->model->getProduct($_GET["id"]);
        }


        include "views/basepage.php";
    }
}
