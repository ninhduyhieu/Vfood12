<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>QL Sản phẩm</title>
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
	<style>
		.phan-trang {
			width: 100%;
			text-align: center;
			list-style: none;
			list-style: none;
			font-weight: bold;
			font-size: 1.5em;
			overflow: hidden;
			margin-bottom: 10px;
		}

		.phan-trang li {
			display: inline;
		}

		.phan-trang a {
			padding: 10px;
			border: 1px solid #ebebeb;
			text-decoration: none;
		}
	</style>
</head>

<body>


	<!-- Body -->
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
						<!-- Trang quản lý sản phẩm -->

						<!-- Mở kết nối tới csdl -->
						<?php
						include_once 'connection.php';
						require_once 'upload_file.php';
						?>
						<!-- Thêm/Sửa sản phẩm nếu có dữ liệu gửi đi -->
						<?php
						if (isset($_POST["submit"])) {
							$updateId = 0; // Mã cập nhật
							if (isset($_POST["updateId"])) {
								$updateId = $_POST["updateId"];
							}

							$MaDM = $_POST["optCatelog"];
							$name = $_POST["txtName"];
							$oldPrice = $_POST["txtOldPrice"];
							$newPrice = $_POST["txtNewPrice"];
							$desc = $_POST["txtDesc"];
							$status = isset($_POST["chkStatus"]) ? 1 : 0;

							$sql = "";

							if ($updateId != 0) {
								$sql = "UPDATE `san_pham` SET `MaDM`=" . $MaDM . ",`name`='" . $name . "',`gia_moi`=" . $newPrice . ",`gia_cu`=" . $oldPrice . ",`description`='" . $desc . "',`status`=" . $status . " WHERE `MaSP`=" . $updateId;
							} else {
								$sql = "INSERT INTO `san_pham`(`MaDM`, `name`, `gia_moi`,`gia_cu`, `description`, `status`) VALUES (" . $MaDM . ",'" . $name . "'," . $newPrice . "," . $oldPrice . ",'" . $desc . "'," . $status . ")";
							}

							mysqli_query($conn, $sql);
							$idPrd = 0;
							if ($updateId == 0) {
								$idPrd = mysqli_insert_id($conn);
							}

							if ($idPrd != 0 || $updateId != 0) {
								if ($updateId != 0) {
									echo "<script> window.alert('Update successfully!');
                                    		window.location = '/shop/admin/manager_product.php'</script>";
								} else {
									echo "<script> window.alert('Add new successfully!');
											window.location = '/shop/admin/manager_product.php'</script>";
								}
								// Tải file ảnh lên server
								if (!empty($_FILES["fileToUpload"]["name"])) {
									$filePath = $_FILES["fileToUpload"];
									$extension = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
									$filename = "";
									if ($updateId != 0) {
										$filename = "prd_" . $updateId . "." . $extension; // Sửa
									} else {
										$filename = "prd_" . $idPrd . "." . $extension; // Thêm
									}

									uploadFile($filePath, $filename);

									// Cập nhật tên ảnh khi THÊM / SỬA
									$id4Update = ($updateId != 0) ? $updateId : $idPrd;
									$sql = "UPDATE `san_pham` SET `image`='" . $filename . "' WHERE MaSP = " . $id4Update;

									mysqli_query($conn, $sql); // Truy vấn						
								} else {
									// echo "Không có file tải lên";
								}
							} else {
								echo "Thất bại: " . mysqli_error($conn) . "(" . $sql . ")";
							}
						}
						?>

						<!-- Tải danh mục sản phẩm -->
						<?php
						$sql = "SELECT * FROM `danh_muc`";
						// Truy vấn
						$resultCat = mysqli_query($conn, $sql); // Dữ liệu danh mục
						
						// Load dữ liệu sản phẩm theo ID
						$pID = 0;
						$pCat = 0;
						$pName = "";
						$pNewPrice = 0;
						$pOldPrice = 0;
						$pDesc = "";
						$pImage = "";
						$pStatus = true;
						if (isset($_GET["prdid"])) {
							$sql = "SELECT * FROM `san_pham` WHERE MaSP = " . $_GET["prdid"];

							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
									$pID = $row["MaSP"];
									$pCat = $row["MaDM"];
									$pName = $row["name"];
									$pNewPrice = $row["gia_moi"];
									$pOldPrice = $row["gia_cu"];
									$pDesc = $row["description"];
									$pImage = $row["image"];
									$pStatus = $row["status"];
								}
							}
						}
						?>

						<!-- Tạo form nhập dữ liệu sản phẩm -->
						<div class="container-xxl flex-grow-1 container-p-y">
							<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span></h4>
							<div class="col-xxl">
								<div class="card mb-4">
									<div class="card-body">
										<form action="#" method="post" enctype="multipart/form-data">
											<!-- Mã ID của sản phẩm cho cập nhật -->
											<input type="hidden" id="updateId" name="updateId"
												value="<?php echo $pID ?>">
											<table width="100%" cellpadding="6" cellspacing="6">
												<tr>
													<th>Category</th>
													<td>
														<select class="form-select" name="optCatelog" id="optCatelog">
															<?php
															while ($row = mysqli_fetch_assoc($resultCat)) {
																if ($pCat == $row["MaDM"]) {
																	echo "<option selected value='" . $row["MaDM"] . "'>" . $row["name"] . "</option>";
																} else {
																	echo "<option value='" . $row["MaDM"] . "'>" . $row["name"] . "</option>";
																}
															}
															?>
														</select>
													</td>
													<td>Name</td>
													<td><input class="form-control" type="text" name="txtName" required
															id="txtName" value="<?php echo $pName ?>">
													</td>
												</tr>
												<tr>
													<td>Price</td>
													<td><input class="form-control" type="number" name="txtNewPrice"
															id="txtNewPrice" value="<?php echo $pNewPrice ?>" min="0"
															step="100"></td>
													<td>Old Price</td>
													<td><input class="form-control" type="number" name="txtOldPrice"
															id="txtOldPrice" value="<?php echo $pOldPrice ?>" min="0"
															step="100"></td>
												</tr>
												<tr>
													<td>Description</td>
													<td colspan="5"><textarea class="form-control" style="width: 100%"
															name="txtDesc" id="txtDesc"><?php echo $pDesc ?></textarea>
													</td>
												</tr>
												<tr>
													<td>Image</td>
													<td colspan="5">
														<?php
														if (!empty($pImage)) {
															?>
															<img width="200" height="260"
																src='<?php echo "../img/" . $pImage ?>' alt="">
														<?php } ?>
														<input class="form-control" type="file" name="fileToUpload"
															id="fileToUpload">
													</td>
												</tr>
												<tr>
													<td>In stock</td>
													<td>
														<?php
														if ($pStatus) {
															?>
															<input class="form-check-input" type="checkbox" name="chkStatus"
																id="chkStatus" value="1" checked="">
														<?php } else { ?>
															<input class="form-check-input" type="checkbox" name="chkStatus"
																id="chkStatus" value="1">
														<?php } ?>
													</td>
													<td colspan="4">
														<?php
														if ($pID) {
															?>
															<input class="btn btn-primary" type="submit" name="submit"
																value="Update">
														<?php } else { ?>
															<input class="btn btn-primary" type="submit" name="submit"
																value="Add">
														<?php } ?>
														<input class="btn btn-primary" type="reset" value="Reset">

													</td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php
						$page = 0;
						if (isset($_GET["page"])) {
							// echo $_GET["page"];
							$page = $_GET["page"] - 1;
						}

						// Lấy tổng số trang
						$sql = "SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 6) AS 'totalpage'"; // Mỗi page 6 items >>> có thể thay đổi theo tham số
						$result = mysqli_query($conn, $sql);
						$totalpage = 0;
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								$totalpage = $row["totalpage"];
							}
						}

						// Tải sản phẩm (all)
						// $sql = "SELECT * FROM `san_pham`";
						// Lấy OFFSET hiện tại
						$sql = "SELECT " . $page . " * (SELECT (SELECT COUNT(*) FROM `san_pham`) / (SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 6))) AS 'offset'";
						$result = mysqli_query($conn, $sql);
						$offset = 0;
						while ($row = mysqli_fetch_assoc($result)) {
							$offset = (int) $row["offset"];
						}

						// Lấy items trong trang
						$sql = "SELECT * FROM `san_pham` LIMIT " . $offset . ", 6";
						// echo $sql;
						
						$result = mysqli_query($conn, $sql); // Truy vấn
						// $result = mysqli_multi_query($conn, $sql); // Truy vấn
						
						// Duyệt hiển thị dữ liệu
						if (mysqli_num_rows($result) > 0) {
							// Code bảng dữ liệu hiển thị
							?>
							<!-- Phân trang -->
							<hr>
							<ul class="phan-trang">
								<?php
								for ($i = 1; $i <= $totalpage; $i++) {
									echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
								}
								?>
							</ul>
							<div class="card">
								<div class="">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<!-- <th>Danh mục</th> -->
												<th style="text-align: center" colspan="2">Products</th>
												<th>Price</th>
												<th>Old Price</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="table-border-bottom-0">
											<?php
											// Duyệt vòng lặp lấy dữ liệu 
											while ($row = mysqli_fetch_assoc($result)) {
												echo "<tr>";
												echo "<td>" . $row["MaSP"] . "</td>";
												echo "<td style='text-align: center'><img width='100' height='130' src='../img/" . $row["image"] . "' alt='Lỗi hiển thị ảnh'></td>";
												echo "<td><strong>" . $row["name"] . "</strong></td>";
												echo "<td><strong>" . number_format($row["gia_moi"]) . "</strong></td>";
												echo "<td><del>" . number_format($row["gia_cu"]) . "</del></td>";
												echo "<td>" . $row["description"] . "</td>";
												if ($row["status"] == 1) {
													echo "<td><span class='badge bg-label-primary me-1'>In Stock</span></td>";
												} else {
													echo "<td><span class='badge bg-label-warning me-1'>Out Stock</span></td>";
												}
												?>
												<td>
													<div class='dropdown'>
														<button type='button' class='btn p-0 dropdown-toggle hide-arrow'
															data-bs-toggle='dropdown'>
															<i class='bx bx-dots-vertical-rounded'></i>
														</button>
														<div class='dropdown-menu'>
															<a class='dropdown-item' href='?prdid=<?php echo $row["MaSP"]; ?>'>
																<i class='bx bx-edit-alt me-1'></i> Edit </a>
															<a class='dropdown-item'
																href="delete-prd.php?MaSP=<?php echo $row["MaSP"]; ?>">
																<i class='bx bx-trash me-1'></i> Delete </a>
														</div>
													</div>
												</td>

												<?php
											}
											?>
										</tbody>
									</table>
								</div>
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
<?php
// Khái niệm phân trang: SELECT * FROM `san_pham` LIMIT 0, 6
/*
	   Lấy tổng số lượng: SELECT COUNT(*) FROM `san_pham`
	   Tổng số trang: SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 6) >>> làm tròn xuống FLOOR / làm tròn lên CEIL
	   
	   -- Số item trên mỗi trang
	   SELECT (SELECT COUNT(*) FROM `san_pham`) / (SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 6))
	   -- limit mỗi trang: 6 item
	   
	   -- 2 là số trang hiện tại		
	   SET @start = (SELECT 2 * (SELECT (SELECT COUNT(*) FROM `san_pham`) / (SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 6))));
	   PREPARE stmt FROM "SELECT * FROM `san_pham` LIMIT ?, 6";
	   EXECUTE stmt USING @start
   */
?>