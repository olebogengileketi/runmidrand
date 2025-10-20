<?php

session_start();
require_once '../backend/config/db.php';
$customerID = "ava199905kha";
// Sanitize inputs
$orderID = isset($_GET['orderID']) ? (int)$_GET['orderID'] : 0;
$productID = isset($_GET['productID']) ? (int)$_GET['productID'] : 0;

// Validate IDs
if ($orderID <= 0 || $productID <= 0) {
    die("<div style='margin:20px; color:red;'>Invalid request.</div>");
}

// Confirm the product belongs to this customer's order
$stmt = $pdo->prepare("
    SELECT p.name, p.image_url
    FROM orders o
    JOIN product_cart_item pci ON o.cartID = pci.cartID
    JOIN product p ON pci.productID = p.productID
    WHERE o.orderID = ? AND o.customerID = ? AND p.productID = ?
");
$stmt->execute([$orderID, $customerID, $productID]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("<div style='margin:20px; color:red;'>⚠️ No matching product found for this order. Please make sure you purchased this product.</div>");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Write a Review</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../frontend/styles/index.css" />
  <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/navbar.css" />
  <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/footer.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="container py-5">

<!-- ✅ Navbar -->
<nav class="navbar" id="mainNav">
  <div class="navbar-container">
    <a class="navbar-brand" href="#">
      <img src="../frontend/images/logo-black.png" id="navbar-brand-img">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list"></i>
    </button>
    <div class="navbar-collapse">
      <ul class="navbar-nav-links">
        <li class="nav-item"><a class="nav-link" href="index.php#services">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#portfolio">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#about">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#team">About</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>

        <!-- Settings Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="reviews.php">Purchases</a></li>
          </ul>
        </li>

        <!-- Cart Icon -->
        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="bi bi-cart"></i></a></li>
      </ul>
      <input type="search" placeholder="Search for products or services">
    </div>
  </div>
</nav>

<br>

<!-- ✅ Review Form -->
<h3>Write a Review for: <?= htmlspecialchars($product['name']) ?></h3>
<img src="<?= htmlspecialchars($product['image_url']) ?>" alt="Product" style="width:150px;" class="mb-3">

<form method="post" action="submit_review.php">
    <input type="hidden" name="productID" value="<?= $productID ?>">
    <input type="hidden" name="orderID" value="<?= $orderID ?>">

    <div class="mb-3">
        <label for="rating" class="form-label">Rating (1 to 5):</label>
        <select class="form-select" id="rating" name="rating" required>
            <option value="">Choose...</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> Star<?= $i > 1 ? 's' : '' ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="comments" class="form-label">Your Review:</label>
        <textarea class="form-control" id="comments" name="comment" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-danger w-50">Submit Review</button>
    <a href="reviews.php" class="btn btn-secondary ms-2">Cancel</a>
</form>

</body>
</html>