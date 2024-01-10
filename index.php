<?php
    namespace A;
/*
1. Class (lớp):
1.1. Attribute (thuộc tính): tên, mã sinh viên, email, năm sinh, ...
1.2. Method (phương thức): hàm xử lý
*/
    //class cha
    class SinhVien {
        public $maSV;
        public $ten;
        public $email;
        public $namSinh;

        public $public = 'public';
        protected $protected = 'protected';
        private $private = 'private';

        function __construct($maSV,$ten,$email,$namSinh) {
            //biến giả $this
            $this->maSV = $maSV;
            $this->ten = $ten;
            $this->email = $email;
            $this->namSinh = $namSinh;
        }

        function hienThiThongTin() {
            echo $this->maSV.'-'.$this->ten.'-'.$this->email.'-'.$this->namSinh;
        }

        function testAccessLevel() {
            echo $this->public;
            echo $this->protected;
            echo $this->private;
        }
    }

    //class con, kế thừa từ class SinhVien
    class SinhVienCNTT extends SinhVien {
        function testAccessLevel2() {
            echo $this->public;
            echo $this->protected;
            echo $this->private;
        }
    }
    
    //phạm vi bên ngoài class
    $sinhVien = new SinhVien('PH12345','Nguyen Van A','a@fpt.edu.vn',2004);
    // echo $sinhVien->public; //in ra màn hình public
    // echo $sinhVien->protected; //lỗi cannot access protected property
    // echo $sinhVien->private; //lỗi cannot access private property
    // $sinhVien->testAccessLevel();
    $svCNTT1 = new SinhVienCNTT('PH12345','Nguyen Van C', 'c$fpt.edu.vn',2004);
    // echo $svCNTT1->public; //in ra màn hình public
    // echo $svCNTT1->protected; //lỗi cannot access protected property
    // echo $svCNTT1->private;
    // $svCNTT1->testAccessLevel2();

    //overriding trong kế thừa
    class HinhChuNhat {
        protected $chieuDai;
        protected $chieuRong;
        function __construct($chieuDai, $chieuRong) {
            $this->chieuDai = $chieuDai;
            $this->chieuRong = $chieuRong;
        }

        public function tinhDienTich() {
            echo $this->chieuDai*$this->chieuRong;
        } 
    }

    //class HinhVuong kế thừa lại class HinhChuNhat
    class HinhVuong extends HinhChuNhat {
        function __construct($canh) {
            $this->chieuDai = $canh;
            $this->chieuRong = $canh;
        }
    }
    $hinhVuong = new HinhVuong(4,4);
    $hinhVuong2 = new HinhVuong(5);
    $hinhVuong->tinhDienTich();
    $hinhVuong2->tinhDienTich();
    // var_dump($svCNTT1);

/*
2. Object (thực thể):
*/
    //khởi tạo object: 
    $sinhVien1 = new SinhVien('PH12345','Nguyen Van A','a@fpt.edu.vn',2004);
    // var_dump($sinhVien1->ten);
    // $sinhVien1->hienThiThongTin();
    $sinhVien2 = new SinhVien('PH54321','Nguyen Van B','b@fpt.edu.vn',2004);
    
    /*
    sinhVien1 {
        'maSV' => 'PH12345',
        'ten' => 'Nguyen Van A',
        'email' => 'a@fpt.edu.vn',
        'namSinh' => 2004,
    }
    */
?>