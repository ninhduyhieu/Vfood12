<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="customer_logreg/colorlib-regform-7/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="customer_logreg/colorlib-regform-7/css/style.css">
    <!-- javascript -->
    <script type="text/javascript" src="customer_logreg/colorlib-regform-7/js/main_script.js"></script>
</head>
<body>
	<!-- Header -->	
    <?php include_once 'connection.php' ?>
	<?php
	if (isset($_POST["submit"])) {		
		$uname = $_POST["username"];
		$pass = md5($_POST["password"]);
		$name = $_POST["name"]; 
		$email = $_POST["email"];
		
		// Lệnh prepare
		$sql = "INSERT INTO `khach_hang`(`username`, `password`, `name`, `email`) VALUES (?,?,?,?)";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "ssss", $uname, $pass, $name, $email);
		$result = mysqli_stmt_execute($stmt); // Kích hoạt lệnh prepare
		
		if ($result) {
			// Đăng ký thành công
			session_start();
			$_SESSION["username"] = $uname;
            $_SESSION["name"] = $name;				
            $_SESSION["email"] = $email;			
			header("Location: customer_login.php");
		} else {
			// Đăng nhập thất bại
			echo "<script>alert('Đăng ký thất bại!');</script>";
		}
	}
	?>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form name="form_login" action="#" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label> 
                                <input type="text" name="username" id="username" required="" placeholder="Username"/> 
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required="" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" required="" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" required="" placeholder="Your Email"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register" onclick=""/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="customer_logreg/colorlib-regform-7/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="customer_login.php" class="signup-image-link">I am already member</a>
                        <a href="index.php">Homepage</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="customer_logreg/colorlib-regform-7/vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>