<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MShop</title>
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="assets/css/demo.css" />

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

	<link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="assets/vendor/js/helpers.js"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="assets/js/config.js"></script>
	<!-- <style>
		.box-odd {
			background-color: cyan;
		}
	</style> -->
</head>

<body>
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<?php include_once 'menu.php'; ?>
			</aside>

			<!-- Body -->
			<div class="layout-page">
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<div>
							<!-- Trang quản lý hóa đơn -->
							<div class="container-xxl flex-grow-1 container-p-y">
								<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Invoice/</span></h4>
							</div>
							<!-- Mở kết nối tới csdl -->
							<?php
							include_once 'connection.php';
							// Tải hóa đơn (all)
							$sql = "SELECT * FROM `hoa_don`  ";
							$result = mysqli_query($conn, $sql); // Truy vấn
							
							// Duyệt hiển thị dữ liệu
							if (mysqli_num_rows($result) > 0) {
								// Code bảng dữ liệu hiển thị
								?>
								<div class="card">
									<div class="">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>ID</th>
													<th>Consignee </th>
													<th>Phone</th>
													<th>Address</th>
													<th>Email</th>

													<th>Total</th>
													<th>Date</th>
													<th style="text-align: center">Status</th>
												</tr>
											</thead>
											<tbody class="table-border-bottom-0">
												<?php
												$cnt = 1;
												// Duyệt vòng lặp lấy dữ liệu 
												while ($row = mysqli_fetch_assoc($result)) {
													if ($cnt % 2 != 0) {
														echo "<tr class='box-odd'>";
													} else {
														echo "<tr>";
													}
													$cnt++;
													echo "<td>" . $row["MaHD"] . "</td>";
													echo "<td><strong>" . $row["name_nguoinhan"] . "<strong></td>";
													echo "<td>" . $row["phone_nguoinhan"] . "</td>";
													echo "<td>" . $row["address_nguoinhan"] . "</td>";
													echo "<td>" . $row["email"] . "</td>";
													echo "<td><strong>" . number_format($row["total"]) . "</strong></td>";
													echo "<td>" . date("d/m/Y H:i:s", strtotime($row["ngay_HD"])) . "</td>"; // Định dạng dữ liệu ngày tháng được hiển thị
													echo "<td style='text-align:center'>";
													if ($row["status"] == 1) {
														echo "<a href='invoice_delivery.php?invoiceId=" . $row["MaHD"] . "'><img width='50px' src='images/ic_delivery.png' alt='delivery' title='delivery'></a>";
													} else {
														echo "<span class='badge bg-label-success me-1'>Completed</span>";
													}
													echo "</td>";
													?>
													<td>
														<a href="invoice_detail.php?invid=<?php echo $row["MaHD"]; ?>">
															<i class='bx bx-dots-vertical-rounded'></i>
														</a>
													</td>

													<?php
												}
												?>
											</tbody>
										</table>
									</div>
									<?php
							} else {
								echo "<span class='error'>Không tìm thấy sản phẩm phù hợp</span>";
							}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

</body>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
<!-- Page JS -->
<script src="assets/js/dashboards-analytics.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

</html>