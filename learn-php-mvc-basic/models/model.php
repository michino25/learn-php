<?php
require_once "models/product.php";
require_once "models/category.php";
require_once "modules/db_module.php";

class Model
{
    public function getProductList()
    {
        $result = executeQuery("SELECT * FROM tb_product");
        $data = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $product = new Product($rows["id"], $rows["name"], $rows["img"], $rows["desc"], $rows["price"], $rows["id_category"]);
            array_push($data, $product);
        }
        return $data;
    }

    public function getProductListByCategory($id_cate)
    {
        $result = executeQuery("SELECT * FROM tb_product WHERE id_category=" . $id_cate);
        $data = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $product = new Product($rows["id"], $rows["name"], $rows["img"], $rows["desc"], $rows["price"], $rows["id_category"]);
            array_push($data, $product);
        }
        return $data;
    }

    public function getProduct($id)
    {
        $allProduct = $this->getProductList();
        foreach ($allProduct as $product)
            if ($product->getId() === $id)
                return $product;

        return null;
    }


    public function getCategoryList()
    {
        $result = executeQuery("SELECT * FROM tb_category");
        $data = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $category = new Category($rows["id"], $rows["name"]);
            array_push($data, $category);
        }
        return $data;
    }

    public function getCategory($id)
    {
        $allCategory = $this->getCategoryList();
        foreach ($allCategory as $category)
            if ($category->getId() === $id)
                return $category;

        return null;
    }
}
