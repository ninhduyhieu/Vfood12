<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/login.css">
	<script type="text/javascript" src="js/main_script.js"></script>
</head>
<?php include_once 'connection.php' ?>
<body onload="onloadFormComplete()">
	<!-- Header -->
	<?php
	if (isset($_POST["submit"])) {
		$uname = $_POST["username"];
		$pass = md5($_POST["password"]);
		// SQL Injection: a' OR 1=1 --
		// $sql = "SELECT * FROM `admin` WHERE `username` = '".$uname."' AND `password` = '".$pass."'";
		// // echo $sql;
		// $result = mysqli_query($conn, $sql);
		$sql = "SELECT * FROM `khach_hang` WHERE `username` = ? AND `password` = ?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
		mysqli_stmt_execute($stmt); // Kích hoạt lệnh prepare
		$result = mysqli_stmt_get_result($stmt); // Lấy dữ liệu trả về
	
		if (mysqli_num_rows($result) > 0) {
			// Đăng nhập thành công
			// session_start();
			// Lưu thông tin người dùng vào session
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION["MaKH"] = $row["MaKH"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["phone"] = $row["phone"];
				$_SESSION["address"] = $row["address"];
			}

			header("Location: index.php");
		} else {
			// Đăng nhập thất bại
			echo "<script>alert('Tài khoản/mật khẩu không đúng!');</script>";
		}
	}
	?>

	<!-- Body -->
	<!-- Form đăng nhập -->

	<div
			style="width: 400px; height: 300px; margin: 0 auto; margin-top: 100px; overflow: hidden; box-sizing: border-box; padding: 10px">
			<fieldset style="padding: 10px">
				<legend>
					<h2>Log in</h2>
				</legend>
				<form name="form_login" action="#" method="POST" style="width: 100%">
					<table style="width: 100%" cellspacing="6" cellpadding="6">
						<tr>
							<td>Username: </td>
							<td><input type="text" name="username" id="username" required=""></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" id="password" required=""></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="checkbox" name="chkRemember" id="chkRemember" checked="checked">Remember
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="Log in" onclick="return validateLogin();" />
								<input type="reset" value="Reset">
							</td>
						</tr>
						<tr>
							<td colspan="2"><span id="msg_error" style="color: red"></span></td>
						</tr>
					</table>
				</form>
			</fieldset>
		</div>
		




	<!-- Footer -->

</body>

</html>