<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ - Frequently Asked Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />  
    <link href='../styles/Reuseable Styles/navbar.css' rel='stylesheet' />

    </head>
    <style>
/* Change accordion header background to light red */
.accordion-button {
  background-color: #f5f5f5 !important; /* light red */
  color: #721c24 !important; /* dark red text */
  border: 1px solid #f5c6cb;
}

/* Change hover and focus state */
.accordion-button:not(.collapsed):focus,
.accordion-button:focus {
  box-shadow: 0 0 0 0.25rem rgba(244, 244, 244, 0.25);
}

/* Change background when expanded */
.accordion-button:not(.collapsed) {
  background-color: #fd384d !important; /* slightly darker light red */
  color: #ffffff !important;
}

/* Change accordion body background */
.accordion-body {
  background-color: #f9f9f9 !important;
  border-top: 1px solid #f5f5f5;
  color: #721c24;
}

/* Optional: style the border of each accordion item */
.accordion-item {
  border: 1px solid #000000;
  border-radius: 6px;
  margin-bottom: 10px;
  overflow: hidden;
}
</style>
<body>
    
    <!--Nav Bar-->
    <nav class="navbar" id="mainNav">
        <div class="navbar-container">
            <a class="navbar-brand" href="#"> <img src="../images/logo-black.png" id="navbar-brand-img"></a>
            <!-- Navbar Toggler (using Bootstrap Icons) -->
            <button class="navbar-toggler" aria-label="Toggle navigation"> <i class="bi bi-list"></i> </button>
            <div class="navbar-collapse">
                <ul class="navbar-nav-links">
                    <li class="nav-item"><a class="nav-link" href="#services">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <!-- Settings Icon -->
                    <li class="nav-item"><a class="nav-link" href="#settings"><i class="bi bi-gear"></i></a></li>
                    <!-- Cart Icon -->
                    <li class="nav-item"><a class="nav-link" href="#cart"><i class="bi bi-cart"></i></a> </li>
                </ul>
            </div>
        </div>
    </nav>
    
<div class="container my-5">
    <br>
    <br>
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">

        <!-- Accordion Items (same as before) -->
       <?php
$faqs = [
    "How do I place an order?" =>
        "Start by browsing our <strong>Shop</strong> for clothing or our <strong>Services</strong> section for photography, videography, or sound hire. To add items or services to your cart, you’ll need to <strong>log in</strong> or <strong>create an account</strong> if you don’t have one. Once logged in, add your desired products or services to your cart and proceed to checkout.",

    "How does clothing delivery work?" =>
        "At checkout, you’ll provide your delivery details. If your delivery address is within <strong>45 km of Midrand</strong>, you can choose <strong>manual delivery</strong> by the owner. If it’s farther than 45 km, your order will be sent via <strong>Paxi</strong>. The system will automatically find and display the <strong>nearest Pep store</strong> to your location for confirmation before completing your order.",

    "What payment methods do you accept?" =>
        "We offer two payment options: <br>
        • <strong>Ozow online payments</strong> – Fast and secure. Your order is automatically approved and you’ll receive a confirmation email.<br>
        • <strong>Manual payment (EFT)</strong> – After placing your order, transfer the payment and email your proof of payment. Once verified by our admin, your order will be approved.",

    "How will I receive my clothing order and tracking number?" =>
        "Once your payment is approved, your clothing will be sent to the <strong>Paxi Pep store</strong> you confirmed at checkout. The tracking number will then be <strong>sent manually by email</strong> once the package is dispatched.",

    "How do I book photography, videography, or sound hire services?" =>
        "Go to the <strong>Services</strong> section, choose your preferred service package, and select the required date. A <strong>50% deposit</strong> is required to confirm the booking (payable via Ozow or manual payment). You’ll receive a confirmation email once the deposit is received. The remaining balance is paid directly to the business owner on the day of the event.",

    "Can I order services and products together?" =>
        "Yes, you can add both clothing products and services to your cart in the same session. However, they are processed separately at checkout: <strong>clothing orders</strong> require full payment and delivery details, while <strong>services</strong> require a 50% deposit and a booking date. Each will have its own payment and confirmation process.",

    "How can I track my orders or services?" =>
        "Log in to your account and go to the <strong>Orders</strong> tab to see the status of your clothing orders. For services, once your deposit is confirmed, further communication and scheduling will be handled directly between you and the business owner.",

    "How do I request a return or refund?" =>
        "If you need to request a return or refund, please visit our <a href='contact_us.php'>Contact</a> page and clearly state that your message is regarding a <strong>return or refund</strong>. Our team will review your request and guide you through the next steps."

];

        $i = 1;
        foreach ($faqs as $question => $answer): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $i ?>">
                    <button class="accordion-button <?= $i === 1
                        ? ""
                        : "collapsed" ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="<?= $i ===
1
    ? "true"
    : "false" ?>" aria-controls="collapse<?= $i ?>">
                        <?= htmlspecialchars($question) ?>
                    </button>
                </h2>
                <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i === 1
    ? "show"
    : "" ?>" aria-labelledby="heading<?= $i ?>" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <?= $answer ?>
                    </div>
                </div>
            </div>
        <?php $i++;endforeach;
        ?>

    </div>

    <!-- Still have questions section -->
    <div class="text-center mt-5">
        <h4>Still have questions?</h4>
        <p>If you couldn’t find the answer you’re looking for, feel free to contact us directly.</p>
        <a href="contact_us.php" class="btn btn-danger">Contact Support</a>
    </div>
    
    
   
        
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome for dumbbell icon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>