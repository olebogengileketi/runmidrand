<?php
include '../config/db.php';
session_start();

//$customerID = $_SESSION['customerID'] ?? null;

if (!$customerID) {
    die("User not logged in.");
}

// ✅ Fetch active cart for the customer
$stmt = $pdo->prepare("SELECT * FROM cart WHERE customerID = ? AND status = 'active' LIMIT 1");
$stmt->execute([$customerID]);
$cart = $stmt->fetch();

if (!$cart) {
    die("No active cart found.");
}

$cartID = $cart['cartID'];

// ✅ Fetch product cart items with product details
$stmt = $pdo->prepare("
    SELECT pci.quantity, p.productID, p.name, p.price, p.image_url
    FROM product_cart_item pci
    JOIN product p ON pci.productID = p.productID
    WHERE pci.cartID = ?
");
$stmt->execute([$cartID]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ✅ Calculate totals
$totalAmount = 0;
foreach ($cart_items as $item) {
    $totalAmount += $item['quantity'] * $item['price'];
}

// ✅ If checkout form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $province = $_POST['province'];
    $city = $_POST['city'];
    $street_address = $_POST['street_address'];
    $apartment = $_POST['apartment'] ?? null;
    $delivery_type = $_POST['delivery_type'];
    $payment_type = $_POST['payment_type'];

    // 1️⃣ Create order
    $stmt = $pdo->prepare("INSERT INTO orders (customerID, cartID, total_amount, delivery_type, status) 
                           VALUES (?, ?, ?, ?, 'Pending')");
    $stmt->execute([$customerID, $cartID, $totalAmount, $delivery_type]);
    $orderID = $pdo->lastInsertId();

    // 2️⃣ Save address
    $stmt = $pdo->prepare("INSERT INTO address (customerID, orderID, province, city, street_address, apartment) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$customerID, $orderID, $province, $city, $street_address, $apartment]);

    // 3️⃣ Save payment record (status = Pending initially)
    $stmt = $pdo->prepare("INSERT INTO payment (orderID, amount, payment_type, status) 
                           VALUES (?, ?, ?, 'Pending')");
    $stmt->execute([$orderID, $totalAmount, $payment_type]);

    // 4️⃣ Mark cart as completed
    $stmt = $pdo->prepare("UPDATE cart SET status = 'completed' WHERE cartID = ?");
    $stmt->execute([$cartID]);

    header("Location:../pages/thank_you.php?orderID=$orderID");
    exit;
}