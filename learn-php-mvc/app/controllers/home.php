<?php

class home extends direction
{

    public function index()
    {
        // load Model (Chứa data cần hiển thị)
        $db_model = $this->model("Product");

        $mangSV = $db_model->getAll();

        $this->view("MasterLayout", [
            "Detail" => "home/index",
            "Mang" => $mangSV
        ]);
    }
}
