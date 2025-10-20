<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$testimonialAdded = false;
$email = '';
$preference = '';
$testimonial = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST["email"] ?? '');
  $preference = trim($_POST["preference"] ?? '');
  $testimonial = trim($_POST["testimonial"] ?? '');

  // Validate email
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Save preference
    $prefEntry = $email . " | " . $preference . PHP_EOL;
    file_put_contents("preferences.txt", $prefEntry, FILE_APPEND | LOCK_EX);

    // Save testimonial if provided
    if (!empty($testimonial)) {
      $testimonialEntry = $email . " | " . $testimonial . PHP_EOL;
      file_put_contents("testimonials.txt", $testimonialEntry, FILE_APPEND | LOCK_EX);
      $testimonialAdded = true;
    }
  } else {
    // Redirect if invalid email somehow got here
    header("Location: ../index.html?error=invalid_email");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Thank You</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container text-center py-5">
    <h1 class="mb-4">🎉 Thank You for Subscribing!</h1>

    <?php if ($testimonialAdded): ?>
      <p>We appreciate your testimonial. It may be featured on our site soon!</p>
    <?php else: ?>
      <p>You're all set! Thanks for subscribing to our newsletter.</p>
    <?php endif; ?>

    <a href="../index.html" class="btn btn-danger mt-4">Back to Home</a>
  </div>
</body>
</html>