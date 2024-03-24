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
	<script>
		function checkDelete(MaDM, name) {
			let isOk = confirm("Delete [" + name + "] - ID: [" + MaDM + "] ");
			if (isOk) {
				<?php
				require_once 'connection.php';
				$idDM = $_GET["MaDM"];
				$sql = "DELETE FROM `danh_muc` WHERE `MaDM` = $idDM";
				$isOk = insertOrUpdate($sql);
				if ($isOk) {
					echo "<script> window.alert('Delete successfully!');
                                    		window.location = '/shop/admin/manager_catelog.php'</script>";
				} else {
					echo "Không thể xóa do lỗi";
				}
				?>
			}
		}
	</script>
</head>

<body>
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->
			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<?php include_once 'menu.php'; ?>
			</aside>
			<!-- Nội dung -->
			<div class="layout-page">
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<!-- Trang quản lý Danh mục -->
						<!-- Mở kết nối tới csdl -->
						<?php include_once 'connection.php'; ?>
						<?php
						$isOk = null;
						$isUpdateOk = null;

						// Thông tin cập nhật
						$idDM = null;
						$nameDM = null;
						// Xử lý lấy dữ liệu cập nhật dữ liệu
						if (isset($_GET["idupdate"])) {
							$idupdate = $_GET["idupdate"];
							// Lấy chi tiết
							$sql = "SELECT * FROM `danh_muc` WHERE `MaDM` = $idupdate";
							$result = selectData($sql);
							if ($result->num_rows > 0) {
								while ($item = $result->fetch_assoc()) {
									$idDM = $item["MaDM"];
									$nameDM = $item["name"];
									break;
								}
							}
						}

						if (isset($_POST["txtId"]) && $_POST["txtId"] != "") {
							//echo "Cập nhật";
							// Xử lý cập nhật dữ liệu khi yêu cầu
							$id = $_POST["txtId"];
							$name = $_POST["txtName"];
							$sql = "UPDATE `danh_muc` SET `name`='$name' WHERE `MaDM`='$id'";
							$isUpdateOk = insertOrUpdate($sql);
							if ($isUpdateOk) {
								echo "<script> window.alert('Update successfully!');
                                    		window.location = '/shop/admin/manager_catelog.php'</script>";
							}
						} else if (isset($_POST["txtName"])) {
							//echo "Thêm mới";
							// Xử lý thêm mới dữ liệu
							$id = $_POST["txtId"];
							$name = $_POST["txtName"];
							$sql = "INSERT INTO `danh_muc`(`name`) VALUES ('$name');";
							$isOk = insertOrUpdate($sql);
						}
						?>

						<!-- Form nhập dữ liệu sản phẩm -->
						<div class="container-xxl flex-grow-1 container-p-y">
							<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span></h4>
							<!-- Basic Layout & Basic with Icons -->
							<div class="row">
								<!-- Basic Layout -->
								<div class="col-xxl">
									<div class="card mb-4">
										<div class="card-header d-flex align-items-center justify-content-between">
											<!-- <h5 class="mb-0">Basic Layout</h5>
											<small class="text-muted float-end">Default label</small> -->
										</div>
										<div class="card-body">
											<form action="#" method="post" enctype="multipart/form-data">
												<div class="row mb-3">
													<label class="col-sm-2 col-form-label"
														for="basic-default-name">Name</label>
													<div class="col-sm-10">
														<input type="number" name="txtId" id="txtId"
															value="<?php echo $idDM ?>" readonly hidden>
														<input type="text" name="txtName" id="txtName"
															class="form-control" value="<?php echo $nameDM ?>"
															placeholder="Category" />
													</div>
												</div>
												<div class="row justify-content-end">
													<div class="col-sm-10">
														<input type="submit" class="btn btn-primary"
															value="<?php echo isset($_GET["idupdate"]) ? "Update" : "Add new" ?>"></input>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$sql = "SELECT * FROM `danh_muc`";
						$result = mysqli_query($conn, $sql); // Truy vấn
						// $result = mysqli_multi_query($conn, $sql); // Truy vấn
						
						// Hiển thị dữ liệu
						if (mysqli_num_rows($result) > 0) {
							// Code bảng dữ liệu hiển thị
							?>

							<hr>

							<div class="card">
								<div class="table-responsive text-nowrap">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Categories</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody class="table-border-bottom-0">
											<?php
											// Duyệt vòng lặp lấy dữ liệu 
											while ($row = mysqli_fetch_assoc($result)) {
												echo "</tr>";
												echo "<td>" . $row["MaDM"] . "</td>";
												echo "<td><i class='fab fa-angular fa-lg text-danger me-3'></i><strong>" . $row["name"] . "</strong></td>";
												echo "<td><span class='badge bg-label-primary me-1'>Active</span></td>";
												echo "<td>
														<div class='dropdown'>
															<button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
																<i class='bx bx-dots-vertical-rounded'></i>
															</button>
														<div class='dropdown-menu'>
															<a class='dropdown-item' href='?idupdate=" . $row["MaDM"] . "'>
																<i class='bx bx-edit-alt me-1'></i> Edit </a>
															<a class='dropdown-item' href='delete-cat.php?MaDM=" . $row["MaDM"] . "'>
																<i class='bx bx-trash me-1'></i> Delete </a>
														</div>
														</div>
								  					</td>";
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<?php
						} else {
							echo "<span class='error'>Không tìm thấy danh mục phù hợp</span>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

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
</body>

</html>