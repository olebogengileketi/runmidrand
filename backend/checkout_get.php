<?php

//session_start();
// Simulate a logged-in customer (replace with your real session user)
//$customerID = $_SESSION['customerID'] ?? 'CUST001';
$customerID = 'sam200011lee';

// Fetch the active cart for this customer
$stmt = $pdo->prepare("SELECT cartID FROM cart WHERE customerID = ? AND status = 'active' LIMIT 1");
$stmt->execute([$customerID]);
$cart = $stmt->fetch();

$cartID = $cart['cartID'] ?? null;
$cartItems = [];
$totalQuantity = 0;
$totalAmount = 0;

if ($cartID) {
    // Fetch all items and join product details
    $stmt = $pdo->prepare("
        SELECT pci.quantity, p.name, p.price, p.image_url
        FROM product_cart_item pci
        JOIN product p ON pci.productID = p.productID
        WHERE pci.cartID = ?
    ");
    $stmt->execute([$cartID]);
    $cartItems = $stmt->fetchAll();

    foreach ($cartItems as $item) {
        $totalQuantity += $item['quantity'];
        $totalAmount += $item['price'] * $item['quantity'];
    }
}  