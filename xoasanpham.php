<?php

require "connect.php";
$id = (int) $_GET['id'];

if ($id < 1) {
    echo 'id khong ton tai';
    die;
}

$sql = "DELETE FROM sanpham WHERE idsanpham=".$id;
if ($conn->query($sql) === TRUE) {
    header("Location:http://localhost/thuctap/index.php");
    die();
} else {
    echo "Error deleting record: " . $conn->error;
}
