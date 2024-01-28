<?php
namespace App\Controllers\Admin;

use App\Models\Product;

class ProductController {
    protected $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    //lấy toàn bộ sản phẩm
    public function getAllProduct() {
        //xử lý logic, validate dữ liệu
        $products = $this->productModel->listProduct();
        include "app/Views/products.php";
    }
    public function getTopTenProduct() {
        
    }
    public function edit($id) {
        $product = $this->productModel->getById($id);
        include "app/Views/edit.php";
    }
    public function update($id) {
        var_dump($_POST);
    }
}

?>
