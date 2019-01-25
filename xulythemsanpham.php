<?php
require "connect.php";

if (!empty($_POST)) {
    $data = $_POST;

    $sql = "INSERT INTO sanpham (tensanpham, loai, donvitinh, mota, gianhap,giaban,soluong, thanhtien)
VALUES ('"
        . $data['ten'] .
        "',' " .
        $data['loai'] .
        "', '" .
        $data['dvt'] .
        "', '" .
        $data['thongtin'] .
        "'," .
        $data['gn'] .
        "," .
        $data['gb'] .
        "," .
        $data['sl'] .
        "," .
        $data['tt'] .
        ")";

    echo $sql;
   /* die();*/
    $result = $conn->query($sql);

    header("Location:http://localhost/thuctap/index.php");
    die();
}
?>
