<?php
session_start();
if (isset($_GET["prdid"])) {	
	$idp = $_GET["prdid"];	
	
	// Kiểm tra đã có biến session giỏ hàng chưa
	if (isset($_SESSION["cart"][$idp])) {
		$_SESSION["cart"][$idp] += $_SESSION["addCart"];
	} else {
		$_SESSION["cart"][$idp] = 1;
	}

	header("Location: shopping_cart.php");
	// echo "Sản phẩm ID ". $_GET["prdid"] . " đã có " . $_SESSION["cart"][$idp];
}
?>