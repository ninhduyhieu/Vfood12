<?php
// get_reviews.php
require_once 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $product_id = $_GET['product_id'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM reviews WHERE product_id = ? ORDER BY created_at DESC";

    // Prepare and execute the statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $product_id);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='review'>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Rating:</strong> " . $row['rating'] . " stars</p>";
        echo "<p><strong>Comment:</strong> " . $row['comment'] . "</p>";
        echo "<p><strong>At:</strong> " . $row['created_at'] . "</p>";
        echo "</div>";
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>
