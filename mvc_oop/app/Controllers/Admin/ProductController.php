<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Traits\ProductTrait; 

class ProductController extends BaseController {
    protected $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    //lấy toàn bộ sản phẩm
    public function getAllProduct() {
        //xử lý logic, validate dữ liệu
        $title = "Danh sách sản phẩm";
        $products = $this->productModel->listProduct();
        // include "app/Views/products.php";
        $this->render('products.products',compact('products','title'));
    }
    public function getTopTenProduct() {
        
    }
    public function edit($id) {
        $product = $this->productModel->getById($id);
        // include "app/Views/edit.php";
        $title="Sửa sản phẩm";
        $this->render('products.edit',compact('product', 'title'));
    }
    public function update($id) {
        var_dump($_POST);
    }
}

?>
