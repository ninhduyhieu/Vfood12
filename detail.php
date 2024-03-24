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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
 
    <!-- Add a link to Font Awesome for star icons (you can replace this with your preferred icon library) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-fm4iGVeo5DEoMQ4ymqwxd7P/9oPF6kVzbo+Dml7zI56UTWZHe2Tt2tVO+2KHT8X1Ig+6Gf28y/ef4fSAiSTw4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
.reviews-section {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
    background: color #e0fefe;;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#reviews-container {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #fff;
    padding: 10px;
    margin-bottom: 20px;
}

#review-form {
    text-align: left;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #fff;
    border-radius: 5px;
    margin-top: 5px;
    margin-bottom: 10px;
}

textarea.form-control {
    resize: vertical;
}

#rating {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.rating-stars {
    color: #fff;
}

.btn-primary {
    background-color: #fff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #fff;
}

/* Add styles for star icons */
.rating-stars i {
    margin-right: 5px;
}

</style>
    
</head>

<body>
    <!-- Header Start -->
    <?php require_once 'header.php' ?>
    <!-- Header End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                <div class="carousel-item active">
                <?php 
                    if (isset($_GET["prdid"])) {
                        $sql = "SELECT * FROM `san_pham` WHERE MaSP = " . $_GET["prdid"];
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) == 1){
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<a class=\"w-100 h-100\" href='detail.php?prdid=".$row["MaSP"]."'><img class=\"img-fluid w-100\" src='img/".$row["image"]."' alt='hp123'></a> <br>";
                            }
                        }
                    }
                ?>
                </div>
                </div>
                </div>
                <!-- <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/product-1.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div> -->
            </div>

            <div class="col-lg-7 pb-5">
                <?php 
                    if (isset($_GET["prdid"])) {
                        $sql = "SELECT * FROM `san_pham` WHERE MaSP = " . $_GET["prdid"];
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) == 1){
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<h3 class=\"font-weight-semi-bold\">".$row["name"]."</h3>";
                            }
                        }
                    }
                ?>
                
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1"></small>
                </div>
                <?php 
                    if (isset($_GET["prdid"])) {
                        $sql = "SELECT * FROM `san_pham` WHERE MaSP = " . $_GET["prdid"];
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) == 1){
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<h3 class=\"font-weight-semi-bold mb-4\">".number_format($row["gia_moi"])."₫</h3>";
                                echo "<p class=\"mb-4\">".$row["description"]."</p>";
                            }
                        }
                    }
            
                ?>
                <!-- <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div> -->
                <!-- <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div> -->
                <?php 
                    if (isset($_GET["prdid"])) {
                        $sql = "SELECT * FROM `san_pham` WHERE MaSP = " . $_GET["prdid"];
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) == 1){
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                            <div class=\"d-flex align-items-center mb-4 pt-2\">
                                <div class=\"input-group quantity mr-3\" style=\"width: 130px;\">
                                    <div class=\"input-group-btn\">
                                        <button class=\"btn btn-primary btn-minus\" >
                                            <i class=\"fa fa-minus\"></i>
                                        </button>
                                    </div>
                                        <input type='text' name='soluong[" . $row["MaSP"] . "]' class=\"form-control bg-secondary text-center\" min='1' value='1' class=\"form-control form-control-sm bg-secondary text-center\">
                                    <div class=\"input-group-btn\">
                                        <button class=\"btn btn-primary btn-plus\">
                                            <i class=\"fa fa-plus\"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href='shopping_add.php?prdid=".$row["MaSP"]."'>
                                <button class=\"btn btn-primary px-3\"><i class=\"fa fa-shopping-cart mr-1\"></i> Add To Cart</button>
                                </a>
                            </div>    
                                ";
                            }
                        }
                    }
            
                ?>
                
                
            </div>
        </div>
    </div>

    <!-- ... (Phần trước đã có) ... -->

<!-- Hiển thị đánh giá -->
<!-- ... (Phần trước đã có) ... -->

<!-- Hiển thị đánh giá -->
<div class="reviews-section">
        <h4>Customer Reviews</h4>
        <div id="reviews-container"></div>

        <h4>Write a Review</h4>
        <form id="review-form">
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" class="form-control" required>
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Your Review:</label>
                <textarea id="comment" name="comment" class="form-control" required></textarea>
            </div>

            <button type="button" onclick="submitReview()" class="btn btn-primary">Submit Review</button>
        </form>
    </div>





<!-- ... (Phần sau đã có) ... -->





    

    
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    
                <?php
            $sql = "SELECT * FROM san_pham LIMIT 4";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
            echo"      
            
                    <div class='card product-item border-0'>
                        <div class=\"card-header product-img position-relative overflow-hidden bg-transparent border p-0\">
                            <img class=\"img-fluid w-100\" src=\"img/" . $row["image"] . "\" alt=\"" . $row["name"] . "\">
                        </div>
                        <div class=\"card-body border-left border-right text-center p-0 pt-4 pb-3\">
                            <h6 class=\"text-truncate mb-3\">" . $row["name"] . "</h6>
                            <div class=\"d-flex justify-content-center\">
                            <h6>" . number_format($row["gia_moi"]) . "₫</h6><h6 class=\"text-muted ml-2\"><del>" . number_format($row["gia_cu"]) . "₫</del></h6>
                            </div>
                        </div>
                        <div class=\"card-footer d-flex justify-content-between bg-light border\">
                            <a href=\"detail.php?prdid=" . $row["MaSP"] . "\" class=\"btn btn-sm text-dark p-0\"><i class=\"fas fa-eye text-primary mr-1\"></i>View Detail</a>
                            <a href='shopping_add.php?prdid=" . $row["MaSP"] . "' class=\"btn btn-sm text-dark p-0\"><i class=\"fas fa-shopping-cart text-primary mr-1\"></i>Add To Cart</a>
                        </div>
                    </div>
            ";
            }  
            ?>      


                </div>
            </div>
        </div>
    </div>
 
    <!-- Products End -->


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
    <script>
  

    // ... (Previous code) ...

    // Hiển thị đánh giá khi trang được tải
    document.addEventListener('DOMContentLoaded', function () {
        loadReviews();
    });

    // Hàm hiển thị đánh giá
    function loadReviews() {
        var product_id = <?php echo $_GET["prdid"]; ?>;
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementById('reviews-container').innerHTML = xhr.responseText;
                } else {
                    alert('Error loading reviews');
                }
            }
        };

        xhr.open('GET', 'get_reviews.php?product_id=' + product_id, true);
        xhr.send();
    }

    // Hàm gửi đánh giá
    function submitReview() {
        var product_id = <?php echo $_GET["prdid"]; ?>;
        var rating = document.getElementById('rating').value;
        var comment = document.getElementById('comment').value;

        // Check if the user is logged in
        var loggedIn = <?php echo isset($_SESSION['email']) ? 'true' : 'false'; ?>;
        if (!loggedIn) {
            alert('You need to log in to submit a review.');
            return;
        }

        var xhr = new XMLHttpRequest();
        var formData = new FormData();

        formData.append('product_id', product_id);
        formData.append('rating', rating);
        formData.append('comment', comment);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    // Tải lại hoặc cập nhật lại phần hiển thị đánh giá
                    loadReviews();
                } else {
                    alert('Error submitting review');
                }
            }
        };

        xhr.open('POST', 'save_review.php', true);
        xhr.send(formData);
    }


</script>

 
    
</body>

</html>