<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    //lấy toàn bộ sản phẩm
    public function getAllProduct() {
        //xử lý logic, validate dữ liệu
        $productModel = new Product(); //khởi tạo object Product model
        $products = $productModel->listProduct();
        include "app/Views/products.php";
    }
    public function getTopTenProduct() {
        
    }
}

?>
