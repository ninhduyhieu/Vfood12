<?php
session_start();
if (isset($_GET["prdid"])) {	
	$idp = $_GET["prdid"];	
	
	// Kiểm tra đã có biến session giỏ hàng chưa
	if (isset($_SESSION["cart"][$idp])) {
		unset($_SESSION["cart"][$idp]); // Loại sản phẩm khỏi giỏ hàng
	}

	header("Location: shopping_cart.php");
	// echo "Sản phẩm ID ". $_GET["prdid"] . " đã có " . $_SESSION["cart"][$idp];
}
?>