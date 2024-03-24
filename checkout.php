<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
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
    <!-- Header Start -->
    <?php require_once 'header.php' ?>
    <!-- Header End -->


    <!-- Checkout Start -->
    <form name="#" action="#" method="POST">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Your Name</label>
                                <input class="form-control" type="text" name="name" id="name" required=""
                                    value="<?php echo $_SESSION["name"] ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="phone" id="phone" required=""
                                    value="<?php echo $_SESSION["phone"] ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" id="email" required=""
                                    value="<?php echo $_SESSION["email"] ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" id="address"
                                    value="<?php echo $_SESSION["address"] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_SESSION["cart"])) {
                    $arrCart = $_SESSION["cart"]; // Biến mảng (từ session) chứa các sản phẩm trong giỏ hàng  
                    $item = array(); // Mảng chứa ID sản phẩm có trong giỏ hàng
                    foreach ($arrCart as $key => $value) {
                        $item[] = $key;
                    }
                    $paramIN = implode(",", $item);
                    $sql = "SELECT * FROM `san_pham` WHERE MaSP IN (" . $paramIN . ")"; // Lấy thông tin các sản phẩm trong giỏ hàng
                    $result = mysqli_query($conn, $sql);
                    ?>

                    <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                        <div class=\"d-flex justify-content-between\">
                            <p>" . $row["name"] . " (" . $arrCart[$row["MaSP"]] . ")</p>
                            <p>" . number_format($arrCart[$row["MaSP"]] * $row["gia_moi"]) . "</p>
                        </div>
                        ";
                                }
                }
                ?>

                            <?php
                            $_SESSION["shipping"] = $shipping = 30000;
                            ?>
                            <hr class="mt-0"> 
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">
                                    <?php echo number_format($_SESSION["subtotal"]); ?>
                                </h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">
                                    <?php echo number_format($_SESSION["shipping"]); ?>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">
                                    <?php echo number_format($_SESSION["total"]); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0"></h4>
                        </div>
                        <!-- <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="card-footer border-secondary bg-transparent">
                            <input type="submit" name="submit" onclick="" value="Place Order"
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
                        </div>
                    </div>

                </div>

            </div>


            <!-- Xử lý đơn hàng gửi đi -->
            <?php
            if (isset($_POST["submit"])) {
                $sql = "INSERT INTO `hoa_don`(`MaKH`, `name_nguoinhan`, `phone_nguoinhan`, `address_nguoinhan`,`email`,`subtotal`,`total`) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sql); // Chuẩn bị kết nối
            
                // Đổ dữ liệu prepare
                mysqli_stmt_bind_param($stmt, "isssssd", $_POST["MaKH"], $_POST["name"], $_POST["phone"], $_POST["address"], $_POST["email"], $_SESSION["subtotal"], $_SESSION["total"]);

                // Kích hoạt lệnh
                if (mysqli_stmt_execute($stmt)) {
                    echo "<h1 style='text-align:center'>Order successfully!</h1>";
                    $MaHD = mysqli_stmt_insert_id($stmt); // Lấy id hóa đơn sau khi thêm >>> đổ lên Hóa Đơn Chi Tiết
            
                    $arrCart = $_SESSION["cart"]; // Biến mảng (từ session) chứa các sản phẩm trong giỏ hàng
                    $sql = ""; // Lệnh truy vấn		
                    foreach ($arrCart as $key => $value) {
                        $sql .= "INSERT INTO `chi_tiet_hoa_don`(`MaHD`, `MaSPCT`, `count`, `price`) VALUES (" . $MaHD . "," . $key . "," . $value . ",(SELECT`gia_moi` FROM `san_pham` WHERE `MaSP` = " . $key . "));";
                    }
                    // (SELECT`price` FROM `product` WHERE `id` = ".$key.") >>> là lệnh truy vấn con lồng trong lệnh INSERT
                    // >>> phát triển lên có thể là lệnh truy vấn bảng dữ liệu khuyến mại
                    // echo $sql;
                    if (mysqli_multi_query($conn, $sql)) {
						echo " <script> window.alert('Order successfully!');
                                    window.location = '/shop'               </script> ";
					} else {
                        echo " <script> window.alert('Error: ".mysqli_error($conn)."');
                                    window.location = '/shop'               </script> ";
						
					}
                    // Làm sạch giỏ hàng sau khi thanh toán
                    unset($_SESSION["cart"]);
                    unset($_SESSION["subtotal"]);
                    unset($_SESSION["shipping"]);
                    unset($_SESSION["total"]);

                    

                }
            }

            ?>
        </div>
    </form>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php require_once 'footer.php' ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>