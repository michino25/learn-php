<?php
class Product
{
    private $id;
    private $name;
    private $img;
    private $desc;
    private $price;
    private $id_category;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function getDesc()
    {
        return $this->desc;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function __construct($id, $name, $img, $desc, $price, $id_category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->desc = $desc;
        $this->price = $price;
        $this->id_category = $id_category;
    }

    public function __toString()
    {
        return "Product($this->name, $this->desc, $this->price)";
    }
}
