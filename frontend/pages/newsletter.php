<?php
include '../../backend/config/db.php'; // adjust path if needed

// Get input
$name = htmlspecialchars(trim($_POST['name'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));

// Validate email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.html?error=invalid_email");
    exit();
}

try {
    // Check if email already exists
    $checkStmt = $pdo->prepare("SELECT * FROM newsletter_subscriber WHERE email = ?");
    $checkStmt->execute([$email]);

    if ($checkStmt->rowCount() === 0) {
        // Insert new subscriber
        $stmt = $pdo->prepare("INSERT INTO newsletter_subscriber (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
    } 
    // else: email already exists – you can ignore or show message
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Newsletter Preferences</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../styles/Reuseable Styles/navbar.css" rel="stylesheet">
</head>
<body>

  <!-- Nav Bar -->
  <nav class="navbar" id="mainNav">
    <div class="navbar-container">
      <a class="navbar-brand" href="#"> 
        <img src="../images/logo-black.png" id="navbar-brand-img">
      </a>
      <button class="navbar-toggler" aria-label="Toggle navigation"> <i class="bi bi-list"></i> </button>
      <div class="navbar-collapse">
        <ul class="navbar-nav-links">
          <li class="nav-item"><a class="nav-link" href="../index.html">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-gear"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cart"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
<br>
  <br>
  <div class="container py-5">
    <h2 class="mb-4">Newsletter Preferences</h2>
    <p class="text-muted">You're subscribing with: <strong><?php echo $email; ?></strong></p>

    <form action="thank_you.php" method="POST">
      <input type="hidden" name="email" value="<?php echo $email; ?>">

      <div class="mb-3">
        <label class="form-label">What would you like to receive?</label>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="preference" value="Special Offers" checked>
          <label class="form-check-label">Special Offers</label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="preference" value="New Products">
          <label class="form-check-label">New Products</label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="preference" value="Information">
          <label class="form-check-label">Information and Updates</label>
        </div>
      </div>

      <div class="mb-3">
        <label for="testimonial" class="form-label">Would you like to leave a testimonial?</label>
        <textarea class="form-control" id="testimonial" name="testimonial" rows="3" placeholder="Write your feedback here..."></textarea>
      </div>

      <button type="submit" class="btn btn-danger">Submit Preferences</button>
    </form>
  </div>
</body>
</html>