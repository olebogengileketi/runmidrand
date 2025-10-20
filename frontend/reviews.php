<?php
require_once '../backend/config/db.php';
$customerID = "ava199905kha"; // replace later with $_SESSION['customerID']

// --- Fetch products needing review ---
$stmtPending = $pdo->prepare("
    SELECT 
        o.orderID,
        p.productID,
        p.name AS product_name,
        p.image_url,
        p.description,
        o.status
    FROM orders o
    JOIN product_cart_item pci ON o.cartID = pci.cartID
    JOIN product p ON pci.productID = p.productID
    LEFT JOIN review r 
        ON r.orderID = o.orderID 
        AND r.productID = p.productID 
        AND r.customerID = o.customerID
    WHERE o.customerID = :customerID
      AND r.reviewID IS NULL
    ORDER BY o.orderID DESC
");
$stmtPending->execute([':customerID' => $customerID]);
$pendingReviews = $stmtPending->fetchAll(PDO::FETCH_ASSOC);

// --- Fetch already reviewed products ---
$stmtReviewed = $pdo->prepare("
    SELECT 
        o.orderID,
        p.productID,
        p.name AS product_name,
        p.image_url,
        p.description,
        o.status,
        r.rating,
        r.comment,
        r.review_date
    FROM review r
    JOIN orders o ON r.orderID = o.orderID
    JOIN product p ON r.productID = p.productID
    WHERE r.customerID = :customerID
    ORDER BY r.review_date DESC
");
$stmtReviewed->execute([':customerID' => $customerID]);
$reviewedProducts = $stmtReviewed->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Purchases & Reviews</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../frontend/styles/index.css" />
  <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/navbar.css" />
  <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/footer.css" />
  <style>
      body {
          background-color: #f8f9fa;
      }

      h2.section-title {
          font-weight: 700;
          letter-spacing: 1px;
          position: relative;
          margin-bottom: 1.5rem;
          text-transform: uppercase;
      }

      h2.section-title::after {
          content: '';
          position: absolute;
          bottom: -8px;
          left: 0;
          width: 80px;
          height: 4px;
          background-color: #EE0202;
          border-radius: 2px;
      }

      .card {
          border: none;
          border-radius: 15px;
          transition: all 0.3s ease;
          background-color: #fff;
      }

      .card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      }

      .btn-danger {
          background-color: #EE0202;
          border: none;
      }

      .btn-danger:hover {
          background-color: #c90000;
      }

      .rating i {
          font-size: 1.1rem;
      }

      .alert {
          border-radius: 12px;
      }
  </style>
</head>
<body class="container py-5">

  <!-- Navbar -->
  <nav class="navbar mb-5" id="mainNav">
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
                  <li class="nav-item"><a class="nav-link" href="#services">HOME</a></li>
                  <li class="nav-item"><a class="nav-link" href="#portfolio">Shop</a></li>
                  <li class="nav-item"><a class="nav-link" href="#about">Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="#team">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                  
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-gear"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                          <li><a class="dropdown-item" href="reviews.php">Purchases</a></li>
                      </ul>
                  </li>
                  
                  <li class="nav-item"><a class="nav-link" href="#cart"><i class="bi bi-cart"></i></a></li>
              </ul>
              <input type="search" placeholder="Search for products or services"> 
          </div>
      </div>
  </nav>
<br>
    
    <br> 
  <!-- =================== PENDING REVIEWS =================== -->
  <h2 class="section-title text-danger">Products Awaiting Your Review</h2>
  <?php if (empty($pendingReviews)): ?>
      <div class="alert alert-success shadow-sm p-3">You’ve reviewed all your purchased products.</div>
  <?php else: ?>
      <div class="row">
          <?php foreach ($pendingReviews as $item): ?>
              <div class="col-md-4 mb-4">
                  <div class="card shadow-sm">
                      <img src="<?= htmlspecialchars($item['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($item['product_name']) ?>" style="height: 220px; object-fit: cover;">
                      <div class="card-body">
                          <h5 class="card-title fw-bold"><?= htmlspecialchars($item['product_name']) ?></h5>
                          <p class="card-text text-muted small mb-3"><?= htmlspecialchars(substr($item['description'], 0, 80)) ?>...</p>
                          <a href="review_product.php?orderID=<?= $item['orderID'] ?>&productID=<?= $item['productID'] ?>" class="btn btn-danger w-100">Write Review</a>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
  <?php endif; ?>

  <hr class="my-5">

  <!-- =================== REVIEWED PRODUCTS =================== -->
  <h2 class="section-title text-black">Your Submitted Reviews</h2>
  <?php if (empty($reviewedProducts)): ?>
      <div class="alert alert-info shadow-sm p-3">You haven’t reviewed any products yet.</div>
  <?php else: ?>
      <div class="row">
          <?php foreach ($reviewedProducts as $r): ?>
              <div class="col-md-4 mb-4">
                  <div class="card shadow-sm">
                      <img src="<?= htmlspecialchars($r['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($r['product_name']) ?>" style="height: 220px; object-fit: cover;">
                      <div class="card-body">
                          <h5 class="card-title fw-bold"><?= htmlspecialchars($r['product_name']) ?></h5>
                          <p class="rating mb-2">
                              <?php for ($i = 1; $i <= 5; $i++): ?>
                                  <i class="bi <?= $i <= $r['rating'] ? 'bi-star-fill text-warning' : 'bi-star text-secondary' ?>"></i>
                              <?php endfor; ?>
                          </p>
                          <p class="text-muted small"><?= htmlspecialchars($r['comment']) ?></p>
                          <p class="text-muted small mb-0">
                              <i class="bi bi-calendar3"></i> Reviewed on <?= date('d M Y', strtotime($r['review_date'])) ?>
                          </p>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
  <?php endif; ?>

</body>
</html>