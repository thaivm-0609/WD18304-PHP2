<?php
    //lớp trừu tượng (abstract class)
    abstract class Animal { 
        // attribute (thuộc tính) 
        // method (phương thức)
        // lớp trừu tượng là lớp có ít nhất 1 abstract function (phương thức trừu tượng)
        // abstract function chỉ được khai báo, không được định nghĩa
        // tức là không có phần body (logic xử lý)
        abstract public function hamTruuTuong();
        public function hamThuong() {

        }
    }
    //class con kế thừa class trừu tượng
    class Cat extends Animal {
        //class con phải ghi đè (overriding) các abstract function
        //có trong abstract class mà nó kế thừa
        public function hamTruuTuong() {

        }
        //abstract function chỉ có thể khai báo ở trong abstract class
        // abstract public function hamTruuTuong2();
    }
    //abstract class không thể khởi tạo object (thực thể)
    // $object = new Animal(); 
    $cat = new Cat(); //khởi tạo object từ class con
    // var_dump($cat);

    //interface (không phải class)
    interface HanhDong {
        // public $public = 'public';//không thể khai báo biến trong interface
        CONST Pi = 3.14; //có thể khai báo hằng số và phương thức (method)
        function chay();
        function an();
        function ngu();
    }
    // interface TestInterface {
    //     function run();
    //     function eat();
    // }

    //1 class có thể implements được nhiều Interface
    class Human implements HanhDong {
        //khi implements 1 interface thì sẽ phải ghi đè (overriding) 
        //toàn bộ phương thức đã được khai báo trong interface
        function chay() {
            echo "2 chân";
        }
        function an() {
            echo "Ăn tạp";
        }
        function ngu() {

        }
    }
    // class Dog implements HanhDong {
    //     function chay() {
    //         echo "4 chân";
    //     }
    // }

    //trait
    //php đơn kế thừa: 1 class chỉ có thể extends từ 1 class
    //trait: ra đời từ phiên bản PHP 5.4, là một module để hỗ trợ đa kế thừa
    trait AuthAdmin {
        //có thể khai báo thuộc tính và phương thức
        public $public='public';
        public function tenFunction() {
            echo "Admin";
        }
        public function getUser() {
            echo "admin";
        }
    }
    trait AuthUser {
        public function function2() {
            echo "User";
        }
        public function getUser() {
            echo "user";
        }
    }
    class Authenticate {
        // use AuthAdmin,AuthUser; //có thể sử dụng nhiều trait
        //sử dụng insteadOf để xác định độ ưu tiên nếu có 2 function trùng tên trong 2 trait
        use AuthAdmin, AuthUser {
            AuthAdmin::getUser insteadOf AuthUser; //function đứng trước insteadOf sẽ được sử dụng
        }
        //có thể sử dụng hàm tenFunction() và hàm function2();
    }

    $newObject = new Authenticate();
    $newObject->getUser();
?>

