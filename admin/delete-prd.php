<?php
require_once 'connection.php';
$idCat = $_GET["MaSP"];
$sql = "DELETE FROM `san_pham` WHERE `MaSP` = $idCat";
$isOk = insertOrUpdate($sql);
if ($isOk) {
    echo "<script> window.alert('Delete successfully!');
                                    		window.location = '/shop/admin/manager_product.php'</script>";
} else{
    echo "Không thể xóa do lỗi";
}

