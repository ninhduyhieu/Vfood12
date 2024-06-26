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
            <?php include_once 'connection.php' ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Trang quản lý hóa đơn -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4">
                                <?php
                                if (isset($_GET["invid"])) {
                                    $sql = "SELECT a.*, b.* FROM `chi_tiet_hoa_don` as a 
                                        INNER JOIN hoa_don as b on a.MaHD = b.MaHD
                                        WHERE a.MaHD = " . $_GET["invid"];
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) == 1) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "                                                       
                                                <span class=\"text-muted fw-light\">Invoice/ID_" . $row["MaHD"] . " </span>                           
                                                ";
                                        }
                                    }
                                }
                                ?>
                            </h4>
                        </div>
                        <!-- Mở kết nối tới csdl -->
                        <?php
                        include_once 'connection.php';
                        // Tải hóa đơn chi tiết
                        $sql = "SELECT a.*, b.*, c.* FROM `chi_tiet_hoa_don` as a 
                        INNER JOIN san_pham as b on a.MaSPCT = b.MaSP
                        INNER JOIN hoa_don as c on a.MaHD = c.MaHD
                        WHERE a.MaHD = " . $_GET["invid"];
                        $result = mysqli_query($conn, $sql); // Truy vấn
                        
                        // Duyệt hiển thị dữ liệu
                        if (mysqli_num_rows($result) > 0) {
                            // Code bảng dữ liệu hiển thị
                            ?>
                            <div class="card">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php
                                        $subtotal1 = 0;
                                        $shipping = 30000;
                                        $cnt = 1;
                                        // Duyệt vòng lặp lấy dữ liệu 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($cnt % 2 != 0) {
                                                echo "<tr class='box-odd'>";
                                            } else {
                                                echo "<tr>";
                                            }
                                            $cnt++;
                                            echo "<td><img style=\"width: 50px;\" src=\"../img/" . $row["image"] . "\"></td>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . number_format($row["gia_moi"]) . "</td>";
                                            echo "<td>" . $row["count"] . "</td>";
                                            echo "<td><strong>" . number_format($row["gia_moi"] * $row["count"]) . "</strong></td>";
                                            ?>
                                            <?php

                                            $subtotal1 += ($row["gia_moi"] * $row["count"]);
                                            $total = $subtotal1 + $shipping;
                                        }


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="card">
                                    <table class="table table-hover">
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>SUBTOTAL</td>
                                                <td>
                                                    <?php echo number_format($subtotal1); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>SHIPPING</td>
                                                <td>
                                                    <?php echo number_format($shipping); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>TOTAL</strong></td>
                                                <td><strong>
                                                    <?php echo number_format($total); ?>
                                                </strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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