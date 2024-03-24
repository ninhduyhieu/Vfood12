<?php
// save_review.php
session_start();

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        echo 'You need to log in to submit a review.';
        exit;
    }

    $product_id = $_POST['product_id'];
    $email = $_SESSION['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO reviews (product_id, email, rating, comment, created_at) VALUES (?, ?, ?, ?, NOW())";
    
    // Prepare and execute the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'isss', $product_id, $email, $rating, $comment);

    if (mysqli_stmt_execute($stmt)) {
        echo "Review submitted successfully";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>




