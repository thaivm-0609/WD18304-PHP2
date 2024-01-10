<?php
    require 'index.php';
    require 'index2.php';

    use A;
    use B;

    $newObject = new A\SinhVien('X','Y','Z',2004);
    var_dump($newObject);
?>