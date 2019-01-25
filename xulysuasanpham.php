<?php
require "connect.php";

/*if (!empty($_POST)){
    $data = $_POST;*/
if (!empty($_POST)){
    $data = $_POST;

    $sql = "UPDATE sanpham SET tensanpham ='".$data['ten']."',loai = '".$data['loai']."',
    donvitinh = '".$data['dvt']."', mota = '".$data['thongtin']."', gianhap = ".$data['gn'].",giaban = ".$data['gb'].",soluong = ".$data['sl'].", thanhtien = ".$data['tt']." WHERE idsanpham = ".$data['idsanpham'];
    echo $sql;

    $result = $conn -> query($sql);

    header("Location:http://localhost/thuctap/index.php");
    die();
}
?>