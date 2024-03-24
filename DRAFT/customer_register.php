<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/main_style.css">
	<script type="text/javascript" src="js/main_script.js"></script>
</head>
<body>
	<!-- Header -->	

	<?php
	if (isset($_POST["submit"])) {		
		$uname = $_POST["username"];
		$pass = md5($_POST["password"]);
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		
		// Lệnh prepare
		$sql = "INSERT INTO `khach_hang`(`username`, `password`, `name`, `email`, `phone`, `address`) VALUES (?,?,?,?,?,?)";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "sssssss", $uname, $pass, $name, $email, $phone, $address);
		$result = mysqli_stmt_execute($stmt); // Kích hoạt lệnh prepare
		
		if ($result) {
			// Đăng ký thành công
			session_start();
			$_SESSION["username"] = $uname;				
			header("Location: index.php");
		} else {
			// Đăng ky thất bại
			echo "<script>alert('Đăng ký thất bại!');</script>";
		}
	}
	?>
	<!-- Body -->
	<div>
		<!-- Form đăng ký -->
		<div style="width: 400px; height: 300px; margin: 0 auto; margin-top: 100px; overflow: hidden; box-sizing: border-box; padding: 10px">
			<fieldset style="padding: 10px">
				<legend><h2>Đăng ký</h2></legend>
				<form name="form_login" action="#" method="POST" style="width: 100%">
					<table style="width: 100%" cellspacing="6" cellpadding="6">
						<tr>
							<td>Tài khoản: </td>
							<td><input type="text" name="username" id="username" required=""> <span style="color: red">*</span></td>
						</tr>
						<tr>
							<td>Mật khẩu</td>
							<td><input type="password" name="password" id="password" required=""> <span style="color: red">*</span></td>
						</tr>
						<tr>
							<td>Họ và tên</td>
							<td><input type="text" name="name" id="name" required=""> <span style="color: red">*</span></td>
						</tr>
						<tr>
							<td>Thư điện tử</td>
							<td><input type="email" name="email" id="email" required=""> <span style="color: red">*</span></td>
						</tr>
						<tr>
							<td>Điện thoại</td>
							<td><input type="text" name="phone" id="phone"></td>
						</tr>
						<tr>
							<td>Địa chỉ</td>
							<td><input type="text" name="address" id="address"></td>
						</tr>				
						<tr>	
							<td></td>						
							<td>
								<input type="submit" name="submit" value="Đăng ký" onclick="" />
								<input type="reset" value="Làm lại">
							</td>
						</tr>
						<tr>
							<td colspan="2"><span id="msg_error" style="color: red"></span></td>
						</tr>
					</table>
				</form>
			</fieldset>
		</div>
	</div>
	
	<!-- Footer -->
			
</body>
</html>