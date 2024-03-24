<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="customer_logreg/colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="customer_logreg/colorlib-regform-7/css/style.css">
    <!-- javascript -->
    <script type="text/javascript" src="customer_logreg/colorlib-regform-7/js/main_script.js"></script>
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
			session_start();
			// Lưu thông tin người dùng vào session
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION["username"] = $row["username"];
				$_SESSION["name"] = $row["name"];
                $_SESSION["phone"] = $row["phone"];
                $_SESSION["email"] = $row["email"];
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
    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="customer_logreg/colorlib-regform-7/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="customer_register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form name="form_login" action="#" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" required="" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required="" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="chkRemember" id="chkRemember" checked="checked" class="agree-term" />
                                <label for="chkRemember" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in" onclick="return validateLogin();" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                <li><a href="index.php">Homepage</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="customer_logreg/colorlib-regform-7/vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    


</html>