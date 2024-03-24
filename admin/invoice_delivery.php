<?php
require_once 'connection.php';
if (isset($_GET["invoiceId"])) {	
	$id = $_GET["invoiceId"];	
	
	// Cập nhật trạng thái đơn hàng
	$sql = "UPDATE `hoa_don` SET `status`= 2 WHERE `MaHD` = ".$id;
	if (mysqli_query($conn, $sql)) {
		header("Location: manager_invoice.php");
	} else {
		echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>