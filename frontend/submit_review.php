<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require_once '../backend/config/db.php';


//$customerID = $_SESSION['customerID'];
$customerID = "ava199905kha";
$orderID = isset($_POST['orderID']) ? (int)$_POST['orderID'] : 0;
$productID = isset($_POST['productID']) ? (int)$_POST['productID'] : 0;
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : "";

// Basic validation
if (!$orderID || !$productID || $rating < 1 || $rating > 5 || strlen($comment) < 5) {
    $_SESSION['error'] = "Please fill out all fields correctly before submitting your review.";
    header("Location: ../frontend/review_product.php?orderID=$orderID&productID=$productID");
    exit();
}

try {
    // Check if the customer already reviewed this product in this order
    $check = $pdo->prepare("
        SELECT COUNT(*) FROM review 
        WHERE customerID = :customerID AND productID = :productID AND orderID = :orderID
    ");
    $check->execute([
        ':customerID' => $customerID,
        ':productID' => $productID,
        ':orderID' => $orderID
    ]);

    if ($check->fetchColumn() > 0) {
        $_SESSION['error'] = "You have already submitted a review for this product.";
        header("Location: review.php");
        exit();
    }

    // Insert new review record
    $insert = $pdo->prepare("
        INSERT INTO review (orderID, customerID, productID, rating, comment, review_date)
        VALUES (:orderID, :customerID, :productID, :rating, :comment, NOW())
    ");

    $insert->execute([
        ':orderID' => $orderID,
        ':customerID' => $customerID,
        ':productID' => $productID,
        ':rating' => $rating,
        ':comment' => $comment
    ]);

    $_SESSION['success'] = "Your review was submitted successfully!";
    header("Location: pages/thank_you.php?review=success");
    exit();

} catch (PDOException $e) {
    error_log("Review submission failed: " . $e->getMessage());
    $_SESSION['error'] = "Something went wrong while submitting your review.";
    header("Location: ../frontend/review_product.php?orderID=$orderID&productID=$productID");
    exit();
}
?>