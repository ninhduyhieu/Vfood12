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

    <script>
        function sortByPrice() {
            let objOption = document.getElementById("optPrice");
            window.location = "/shop/shop.php?sort=" + objOption.value;
        }
    </script>
</head>

<body>
    <!-- Header Start -->
    <?php require_once 'header.php' ?>
    <!-- Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form action="/shop/shop.php" method="get">
                        <div class="dropdown ml-4">
                            <select class="btn border dropdown-toggle" name="search_price_min" id="search_price_min"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <option
                                    value="<?php echo isset($_GET["search_price_min"]) ? $_GET["search_price_min"] : 0 ?>"
                                    class="dropdown-item" hidden>Min Price</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 100000) ? "selected" : "" ?> value="100000"
                                    class="dropdown-item">100,000₫</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 200000) ? "selected" : "" ?> value="200000"
                                    class="dropdown-item">200,000₫ </option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 300000) ? "selected" : "" ?> value="300000"
                                    class="dropdown-item">300,000₫</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 500000) ? "selected" : "" ?> value="500000"
                                    class="dropdown-item">500,000₫</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 1000000) ? "selected" : "" ?> value="1000000"
                                    class="dropdown-item">1,000,000₫</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 5000000) ? "selected" : "" ?> value="5000000"
                                    class="dropdown-item">5,000,000₫</option>
                                <option <?php echo (isset($_GET["search_price_min"]) && $_GET["search_price_min"] == 10000000) ? "selected" : "" ?> value="10000000"
                                    class="dropdown-item">10,000,000₫</option>
                            </select>
                            <select class="btn border dropdown-toggle" name="search_price_max" id="search_price_max"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 90000000000) ? "selected" : "" ?> value="90000000000"
                                    class="dropdown-item" hidden>Max Price</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 200000) ? "selected" : "" ?> value="200000"
                                    class="dropdown-item">200,000₫</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 300000) ? "selected" : "" ?> value="300000"
                                    class="dropdown-item">300,000₫ </option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 500000) ? "selected" : "" ?> value="500000"
                                    class="dropdown-item">500,000₫</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 1000000) ? "selected" : "" ?> value="1000000"
                                    class="dropdown-item">1,000,000₫</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 5000000) ? "selected" : "" ?> value="5000000"
                                    class="dropdown-item">5,000,000₫</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 10000000) ? "selected" : "" ?> value="10000000"
                                    class="dropdown-item">10,000,000₫</option>
                                <option <?php echo (isset($_GET["search_price_max"]) && $_GET["search_price_max"] == 20000000) ? "selected" : "" ?> value="20000000"
                                    class="dropdown-item">20,000,000₫</option>
                            </select>
                            <input style="text-align: center" class="dropdown-item" type="submit" name="submit"
                                value="FILTER">

                        </div>
                    </form>

                    <!-- <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form> -->

                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="#" method="GET">
                                <div class="input-group">
                                    <input id="search" name="search" type="text" class="form-control"
                                        placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <button><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <form action="/shop/shop.php" method="get">
                                <div class="dropdown ml-4">
                                    <select class="btn border dropdown-toggle" name="" id="optPrice"
                                        onchange="sortByPrice()" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <option value="none" class="dropdown-item" hidden>Sort By Price</option>
                                        <option <?php echo (isset($_GET["sort"]) && $_GET["sort"] == 'asc') ? "selected" : "" ?> value="asc" class="dropdown-item">Ascending</option>
                                        <option <?php echo (isset($_GET["sort"]) && $_GET["sort"] == 'desc') ? "selected" : "" ?> value="desc" class="dropdown-item">Descending</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- SHOW PRODUCT -->

                    <?php
                    $condition = "";
                    if (isset($_GET["MaDM"])) {
                        $condition = " WHERE MaDM = " . $_GET["MaDM"];
                    }

                    // Tìm kiếm cơ bản
                    if (isset($_GET["search"])) {
                        $condition = " WHERE name LIKE '%" . $_GET["search"] . "%' 
                            ";
                    }

                    // Lọc giá 
                    if (isset($_GET["search_price_min"]) || isset($_GET["search_price_max"])) {
                        $condition = " WHERE 1=1 ";
                        if (isset($_GET["search_price_min"])) {
                            $condition .= " AND gia_moi >= " . $_GET["search_price_min"];
                        }
                        if (isset($_GET["search_price_max"])) {
                            $condition .= " AND gia_moi <= " . $_GET["search_price_max"];
                        }
                    }

                    // Sắp xếp
                    if (isset($_GET["sort"])) {
                        $condition = "ORDER BY gia_moi " . $_GET["sort"];
                    }

                    // 1. Lệnh truy vấn 
                    // $sql = "SELECT * FROM `san_pham`" . $condition;
                    
                    // // 2. Truy vấn
                    // $result = mysqli_query($conn, $sql);
                    ?>

                    <?php
                    $page = 0;
                    if (isset($_GET["page"])) {
                        // echo $_GET["page"];
                        $page = $_GET["page"] - 1;
                    }

                    // Lấy tổng số trang
                    $sql = "SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 9) AS 'totalpage'";
                    $result = mysqli_query($conn, $sql);
                    $totalpage = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $totalpage = $row["totalpage"];
                        }
                    }

                    // Lấy OFFSET hiện tại
                    $sql = "SELECT " . $page . " * (SELECT (SELECT COUNT(*) FROM `san_pham`) / (SELECT CEIL((SELECT COUNT(*) FROM `san_pham`) / 9))) AS 'offset'";
                    $result = mysqli_query($conn, $sql);
                    $offset = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $offset = (int) $row["offset"];
                    }

                    // Lấy items trong trang và lệnh truy vấn
                    $sql = "SELECT * FROM `san_pham` " . $condition . " LIMIT " . $offset . ", 9";
                    // echo $sql;
                    
                    $result = mysqli_query($conn, $sql); // Truy vấn
                    // $result = mysqli_multi_query($conn, $sql); // Truy vấn
                    
                    // Duyệt hiển thị dữ liệu
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class=\"col-lg-4 col-md-6 col-sm-12 pb-1\">
                        <div class=\"card product-item border-0 mb-4\">
                            <a href=\"detail.php?prdid=" . $row["MaSP"] . "\">
                                <div class=\"card-header product-img position-relative overflow-hidden bg-transparent border p-0\">
                                    <img class=\"img-fluid w-100\" src=\"img/" . $row["image"] . "\" alt=\"" . $row["name"] . "\">
                                </div>
                            </a>
                            <div class=\"card-body border-left border-right text-center p-0 pt-4 pb-3\">
                                <h6 class=\"text-truncate mb-3\"> <span>" . $row["name"] . "</span> </h6>
                                <div class=\"d-flex justify-content-center\">
                                    <h6><span><font color=\"red\">" . number_format($row["gia_moi"]) . "₫</font> </span></h6>
                                    <h6 class=\"text-muted ml-2\"><del><span><font>" . number_format($row["gia_cu"]) . "₫</font> </span></del></h6>
                                </div>
                            </div>
                            <div class=\"card-footer d-flex justify-content-between bg-light border\">
                                    <a href=\"detail.php?prdid=" . $row["MaSP"] . "\" class=\"btn btn-sm text-dark p-0\"><i class=\"fas fa-eye text-primary mr-1\"></i>View Detail</a>
                                    <a href='shopping_add.php?prdid=" . $row["MaSP"] . "' class=\"btn btn-sm text-dark p-0\"><i class=\"fas fa-shopping-cart text-primary mr-1\"></i>Add To Cart</a>
                            </div>
                        </div>  
                    </div>
                ";
                        }
                    }
                    ?>

                    <!-- Phân trang Start -->
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <?php
                                    for ($i = 1; $i <= $totalpage; $i++) {
                                        echo "<li><a class=\"page-link\" href='?page=" . $i . "'>" . $i . "</a></li>";
                                    }
                                    ?>
                                </li>

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Phân trang End -->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

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