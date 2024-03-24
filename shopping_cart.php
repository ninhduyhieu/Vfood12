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
    <!-- Header Start -->
    <?php require_once 'header.php' ?>
    <!-- Header End -->

    <!-- Cart Start -->
    <?php

    if (isset($_SESSION["cart"])) {
        if (count($_SESSION["cart"]) > 0) {

            $arrCart = $_SESSION["cart"]; // Biến mảng (từ session) chứa các sản phẩm trong giỏ hàng
    
            $item = array(); // Mảng chứa ID sản phẩm có trong giỏ hàng
            foreach ($arrCart as $key => $value) {
                $item[] = $key;
            }

            $paramIN = implode(",", $item);
            $sql = "SELECT * FROM `san_pham` WHERE MaSP IN (" . $paramIN . ")"; // Lấy thông tin các sản phẩm trong giỏ hàng
            $result = mysqli_query($conn, $sql);
            echo "<br>";
            ?>
            <div class="container-fluid pt-5">
                <div class="row px-xl-5">
                    <div class="col-lg-8 table-responsive mb-5">
                        <form action="shopping_update.php" method="post">
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-secondary text-dark">
                                    <tr>
                                        <th colspan="2">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <?php
                                $subtotal = 0;
                                $shipping = 30000;

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                        <tbody class=\"align-middle\">
                            <tr>
                                <td class=\"align-middle\"><img style=\"width: 50px;\" src=\"img/" . $row["image"] . "\"></td>
                                <td class=\"align-middle\">" . $row["name"] . "</td>
                                <td class=\"align-middle\">" . number_format($row["gia_moi"]) . "</td>
                                <td class=\"align-middle\">
                                    <div class=\"input-group quantity mx-auto\" style=\"width: 100px;\">
                                        <div class=\"input-group-btn\">
                                            <button class=\"btn btn-sm btn-primary btn-minus\">
                                                <i class=\"fa fa-minus\"></i>
                                            </button>
                                        </div>
                                        <input type='text' name='soluong[" . $row["MaSP"] . "]' min='1' value=" . $arrCart[$row["MaSP"]] . " class=\"form-control form-control-sm bg-secondary text-center\">
                                        <div class=\"input-group-btn\">
                                            <button class=\"btn btn-sm btn-primary btn-plus\">
                                                <i class=\"fa fa-plus\"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>";
                                    $subtotal += ($arrCart[$row["MaSP"]] * $row["gia_moi"]);
                                    echo "
                                <td class=\"align-middle\">" . number_format($arrCart[$row["MaSP"]] * $row["gia_moi"]) . "</td>
                                <td class=\"align-middle\">
                                    <a class=\"btn btn-sm btn-primary\" href='shopping_remove.php?prdid=" . $row["MaSP"] . "'>
                                         <i class=\"fa fa-times\"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        </tbody>    
                            ";
                                }
                                $_SESSION["subtotal"] = $subtotal; // Save subtotal data
                                $_SESSION["shipping"] = $shipping;
                                $total = $subtotal + $shipping;
                                $_SESSION["total"] = $total;
                                ?>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <!-- <form class="mb-5" action="">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Coupon Code">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Apply Coupon</button>
                                </div>
                            </div>
                        </form> -->
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">
                                        <?php echo number_format($subtotal); ?></span>
                                    </h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">
                                        <?php echo number_format($shipping); ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">
                                        <?php echo number_format($total); ?></span>
                                    </h5>
                                </div>
                                <?php
                                // Kiểm tra nếu đã đăng nhập thì hiển thị nút THANH TOÁN >< hiển thị nút yêu cầu ĐĂNG NHẬP
                                if (isset($_SESSION["username"])) {
                                    ?>
                                    <a href="checkout.php">
                                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="customer_login.php">
                                        <button class="btn btn-block btn-primary my-3 py-3">Login To Checkout</button>
                                    </a>
                                    <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        } else {
            echo "Không có sản phẩm trong GIỎ HÀNG!";
        }
    } else {
        echo "Không có sản phẩm trong GIỎ HÀNG!";
    }
    ?>
    <!-- Cart End -->


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