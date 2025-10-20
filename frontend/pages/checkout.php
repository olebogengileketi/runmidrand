<?php
include '../../backend/config/db.php';
//include '../../backend/checkout_backend.php';
include '../../backend/checkout_get.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!--Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
     <link href='../styles/checkout.css' rel='stylesheet' />
    <link href='../styles/register.css' rel='stylesheet' />
    <link href='../styles/Reuseable Styles/navbar.css' rel='stylesheet' />
</head>
    
<!-- I have no idea why i am having issues with seperating the css. I really tried -->
    <!-- This is css to make the collapsing feature white, without it, when you hover, it is bright red which is not visable-->
    <style>
    
    #checkoutAccordion .accordion-button {
  background-color: #ffffff !important; /* pure white */
  color: #333 !important; /* neutral dark text */
  border: 1px solid #dee2e6;
  box-shadow: none !important;
  transition: none !important;
}

/* Remove hover color - keep white */
#checkoutAccordion .accordion-button:hover,
#checkoutAccordion .accordion-button:focus,
#checkoutAccordion .accordion-button:not(.collapsed):hover {
  background-color: #ffffff !important;
  color: #333 !important;
  box-shadow: none !important;
}

/* Expanded state - keep it white too */
#checkoutAccordion .accordion-button:not(.collapsed) {
  background-color: #ffffff !important;
  color: #333 !important;
  box-shadow: none !important;
}

/* Accordion body - white background */
#checkoutAccordion .accordion-body {
  background-color: #ffffff !important;
  color: #333;
  border-top: 1px solid #dee2e6;
}

/* Accordion item styling - subtle border and rounded corners */
#checkoutAccordion .accordion-item {
  border: 1px solid #dee2e6;
  border-radius: 6px;
  margin-bottom: 10px;
  overflow: hidden;
  background-color: #ffffff;
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

    <br>

    <div class="container">
        <form class="form-section" action="../../backend/checkout_backend.php" method="POST">
            <br>
            <div class="form-columns">
                <!-- Left Column -->
                <div class="left-column">
<div class="accordion my-5" id="checkoutAccordion">

  <!-- 1. Shipping Address -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingAddress">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddress" aria-expanded="true" aria-controls="collapseAddress">
        1. Shipping Address
      </button>
    </h2>
    <div id="collapseAddress" class="accordion-collapse collapse show" aria-labelledby="headingAddress" data-bs-parent="#checkoutAccordion">
      <div class="accordion-body">
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="name" placeholder="First Name" required />
          </div>
          <div class="col">
            <input type="text" class="form-control" name="surname" placeholder="Last Name" required />
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="Email" required />
          </div>
          <div class="col">
            <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required />
          </div>
        </div>
        <input type="text" class="form-control mb-3" name="street_address" placeholder="Address" required />
        <input type="text" class="form-control mb-3" name="apartment" placeholder="Apartment/Suite/Floor" />

        <div class="row mb-3">
          <div class="col">
            <select id="province" name="province" class="form-control mb-3" required>
              <option value="">Select Province*</option>
              <option value="Eastern Cape">Eastern Cape</option>
              <option value="Free State">Free State</option>
              <option value="Gauteng">Gauteng</option>
              <option value="KwaZulu-Natal">KwaZulu-Natal</option>
              <option value="Limpopo">Limpopo</option>
              <option value="Mpumalanga">Mpumalanga</option>
              <option value="North West">North West</option>
              <option value="Northern Cape">Northern Cape</option>
              <option value="Western Cape">Western Cape</option>
            </select>
          </div>
          <div class="col">
            <select id="city" class="form-control mb-3" name="city" required>
              <option value="">Select City*</option>
            </select>
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="ZIP Code" required />
          </div>
        </div>

        <button type="button" class="btn btn-danger w-100 mb-4" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">
          Continue to Shipping Method
        </button>
      </div>
    </div>
  </div>

  <!-- 2. Shipping Method -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingShipping">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">
        2. Shipping Method
      </button>
    </h2>
    <div id="collapseShipping" class="accordion-collapse collapse" aria-labelledby="headingShipping" data-bs-parent="#checkoutAccordion">
      <div class="accordion-body">
        <p>
          For easy shipping of clothes, we use collections: PostNet, PEP Paxi, or
          Manual Delivery if your delivery address is within a 45KM radius of Midrand, Gauteng.
        </p>
        <a href="#">Check your location from our business</a>
        <br><br>
        <select id="deliveryMethod" class="form-control mb-3" name="delivery_type" required>
          <option value="">Shipping Method</option>
          <option value="PEP Paxi">PEP Paxi</option>
          <option value="PostNet">PostNet</option>
          <option value="Manual Delivery">Manual Delivery</option>
        </select>
        <button type="button" class="btn btn-danger w-100 mb-4" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
          Continue to Payment
        </button>
      </div>
    </div>
  </div>

  <!-- 3. Payment Method -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingPayment">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
        3. Payment
      </button>
    </h2>
    <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="headingPayment" data-bs-parent="#checkoutAccordion">
      <div class="accordion-body">
        <div style="display: grid; gap: 20px; margin-top: 10px; margin-bottom: 10px;">
          <img src="https://cdn.brandfetch.io/idy9gzLXq0/theme/dark/logo.svg?c=1dxbfHSJFAPEGdCLU4o5B" alt="Ozow" style="width:280px; object-fit:contain;">
          <img src="https://cdn.brandfetch.io/idFw8DodCr/theme/dark/symbol.svg?c=1dxbfHSJFAPEGdCLU4o5B" alt="Mastercard" style="width:100px; object-fit:contain;">   
          <img src="https://cdn.brandfetch.io/idhem73aId/theme/dark/logo.svg?c=1dxbfHSJFAPEGdCLU4o5B" alt="Visa" style="width:100px; object-fit:contain;">                            
        </div>
        <select class="form-control mb-3" name="payment_type" required>
          <option value="">Payment Method</option>
          <option value="Ozow">Ozow Payment</option>
          <option value="Cash">Cash (Email Invoice)</option>
        </select>
      </div>
    </div>
  </div>

</div>
                </div>
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Checkout Summary  -->
              <!-- Checkout Summary  -->
                <div class="col-lg-4">
                    <div class="summary-box">
                        <h4>Summary</h4>

                        <?php if (!empty($cartItems)): ?>
                            <?php foreach ($cartItems as $item): ?>
                                <div class="cart-item d-flex align-items-center mb-2">
                                    <img src="<?= htmlspecialchars($item['image_url']) ?>" 
                                         alt="<?= htmlspecialchars($item['name']) ?>" 
                                         class="product-img" 
                                         style="width:70px; height:70px; object-fit:cover;">

                                    <div class="cart-info flex-grow-1 ms-2">
                                        <p class="mb-1"><?= htmlspecialchars($item['name']) ?></p>
                                        <small>Qty: <?= $item['quantity'] ?> | R<?= number_format($item['price'], 2) ?> each</small>
                                    </div>

                                    <div class="cart-price">
                                        <strong>R<?= number_format($item['price'] * $item['quantity'], 2) ?></strong>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Totals -->
                            <p><strong>Total Items: <?= $totalQuantity ?></strong></p>
                           

                            <p><strong>Total: <span class="float-end">R<?= number_format($totalAmount, 2) ?></span></strong></p>
                        <input type="hidden" name="total_amount" value="<?= $totalAmount ?>">
                        <?php else: ?>
                            <p>Your cart is empty.</p>
                        <?php endif; ?>
                    </div>
                </div>
                                    <!-- Checkout Button -->
                    <button type="submit" class="btn btn-danger w-50 mb-4">CHECKOUT <i class="bi bi-cart"></i></button>     
                </div>
            </div>
        </form>
    </div>

</body>
    <script src="../scripts/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
