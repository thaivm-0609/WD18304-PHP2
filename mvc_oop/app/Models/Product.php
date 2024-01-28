<?php
namespace App\Models;

use App\Models\db;

class Product extends db {
    //lấy toàn bộ sp ở trong CSDL
    public function listProduct() {
        $query = "SELECT * FROM products";

        return $this->getData($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM products WHERE id=".$id;

        return $this->getDataById($query);
    }
}

?>
