<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MShop</title>
	<link rel="stylesheet" href="../css/main_style.css">
</head>
<body>
	<!-- Header -->	
	<header><?php require_once 'header.php';?></header>

	<!-- Body -->
	<div class="content-center main-body">
		<!-- Danh mục -->
		<div style="width: 20%; float:left; overflow: hidden; box-sizing: border-box;">
			<?php include_once 'menu.php';?>
		</div>
		<!-- Nội dung -->
		<div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px;">
			<!-- Trang quản lý tài khoản -->
			<h1 style="border-bottom: 1px solid #ebebeb; margin-bottom: 10px">Quản lý Tài khoản</h1>
		</div>
	</div>
	
	<!-- Footer -->
	<footer style="height: 50px; min-height: 50px; line-height: 50px; text-align: center">
		<div class="content-center">
			......
		</div>
	</footer>
</body>
</html>