<?php
require_once 'connection.php';
$idCat = $_GET["MaDM"];
$sql = "DELETE FROM `danh_muc` WHERE `MaDM` = $idCat";
$isOk = insertOrUpdate($sql);
if ($isOk) {
    echo "<script> window.alert('Delete successfully!');
                                    		window.location = '/shop/admin/manager_catelog.php'</script>";
} else{
    echo "Không thể xóa do lỗi";
}

