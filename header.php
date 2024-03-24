<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php
        session_start();
    ?>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">

            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://www.facebook.com/duyhieu.ninh.100/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2"
                        href="">
                        <i class="fab fa-spotify"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.instagram.com/duyhieuninh/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="/shop/index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">M</span>Shop</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="shop.php" method="GET">
                    <!-- Form tìm kiếm -->
                    <div class="input-group">
                        <input id="search" name="search" type="text" class="form-control"
                            placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="shopping_cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <?php 
                    if (isset($_SESSION["cart"])) {
                        echo "<span class=\"badge\">" . count($_SESSION["cart"]);
                        echo "</span>" ;
                    
                    }
                    ?>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: auto">
                        <div class="nav-item dropdown">
                            <a class="nav-item nav-link" href='shop.php'>
                                <li>ALL</li>
                            </a>
                            <?php
                            require_once 'connection.php';
                            $sql = "SELECT * FROM `danh_muc`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<a class=\"nav-item nav-link\" href='shop.php?MaDM=" . $row["MaDM"] . "'><li>" . $row["name"] . "</li></a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Page Header Start -->
            
            <div class="col-lg-9">
                
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">M</span>Shop</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link ">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                                <?php
                                    if (isset($_SESSION["username"])) {
                                         echo "<a class=\"nav-item nav-link\"> Welcome " . $_SESSION["username"] . "</a><a class=\"nav-item nav-link\" href='customer_logout.php'>[Log out]</a>";
                                    } else {
                                ?>        
                                <a href="customer_login.php" class="nav-item nav-link">Login</a>
                                <a href="customer_register.php" class="nav-item nav-link">Register</a>
                            </div>
                        <?php } ?>


                    </div>
                </nav>
            </div>
            <!-- Page Header End -->
        </div>
    </div>
    <!-- Navbar End -->
</body>

</html>