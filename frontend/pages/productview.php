<?php
// Example product array
$product = [
    "Name" => "Premium Streetwear T-shirt",
    "Price" => "R599.99",
    "Description" => "Premium Streetwear T-shirt"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product["Name"]); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> <!--Bootstrap Icons-->
    <link rel="stylesheet" href="../styles/Reuseable Styles/navbar.css">
    <link rel="stylesheet" href="../styles/Reuseable Styles/footer.css">
    <link rel="stylesheet" href="../styles/productView.css">
</head>
<body>
    <!--Nav Bar-->
    <nav class="navbar" id="mainNav" >
        <div class="navbar-container">
            <a class="navbar-brand" href="#">
                <img src="../images/logo-black.png" id="navbar-brand-img" >
            </a>
            <!-- Navbar Toggler (using Bootstrap Icons) -->
            <button class="navbar-toggler" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
            </button>
           
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
                    <li class="nav-item"><a class="nav-link" href="#cart"><i class="bi bi-cart"></i></a></li>
                </ul>
                <input type="search" placeholder= "Search for products or services">
            </div>
        </div>
    </nav>

    <!-- Product View Section -->
    <section id="product-view">
        <div class="product-container">
            <div class="product-gallery">
                <img src="img/product1.jpg" alt="Product Image" class="main-image" id="main-image">
                <div class="thumbnail-container">
                    <img src="img/productthumb1.jpg" alt="Thumbnail 1" class="thumbnail active" data-image="img/product1.jpg">
                    <img src="img/productthumb2.jpg" alt="Thumbnail 2" class="thumbnail" data-image="img/product1-alt1.jpg">
                    <img src="img/productthumb3.jpg" alt="Thumbnail 3" class="thumbnail" data-image="img/product1-alt2.jpg">
                    <img src="img/productthumb4.jpg" alt="Thumbnail 4" class="thumbnail" data-image="img/product1-alt3.jpg">
                </div>
            </div>
            
            <div class="product-details">
                <h1 class="product-title">Premium Streetwear T-shirt</h1>
                <p class="product-price">R599.99</p>
                <p class="product-description">
                    Elevate your street style with our premium hoodie. Made from high-quality cotton blend, this hoodie offers comfort and durability. Features include a front pocket, adjustable drawstrings, and ribbed cuffs for a perfect fit.
                </p>
                
                <div class="size-selector">
                    <h4>Select Size:</h4>
                    <div class="size-options">
                        <span class="size-option">S</span>
                        <span class="size-option selected">M</span>
                        <span class="size-option">L</span>
                        <span class="size-option">XL</span>
                        <span class="size-option">XXL</span>
                    </div>
                </div>
                
                <div class="color-selector">
                    <h4>Select Color:</h4>
                    <div class="color-options">
                        <div class="color-option selected" style="background-color: #000000;" data-color="Black"></div>
                        <div class="color-option" style="background-color: #808080;" data-color="Gray"></div>
                        <div class="color-option" style="background-color: #8B0000;" data-color="Maroon"></div>
                        <div class="color-option" style="background-color: #0F52BA;" data-color="Navy Blue"></div>
                    </div>
                </div>
                
                <div class="quantity-selector">
                    <h4>Quantity:</h4>
                    <div class="quantity-controls">
                        <button class="quantity-btn" id="decrease">-</button>
                        <input type="number" class="quantity-input" id="quantity" value="1" min="1" max="10">
                        <button class="quantity-btn" id="increase">+</button>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <button class="add-to-cart-btn" id="add-to-cart">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                    <button class="continue-shopping-btn" onclick="window.location.href='shop.html'">
                        Continue Shopping
                    </button>
                </div>
                
                <div class="social-sharing">
                    <a href="#" class="social-share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-share-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-share-btn pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="social-share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
                
                <button class="pixel-api-btn" id="pixel-track">
                    <i class="fas fa-chart-line"></i> Fit with Pixel
                </button>
            </div>
        </div>
        
        <div class="product-info-tabs">
            <div class="tabs">
                <div class="tab active" data-tab="details">Product Details</div>
             
                <div class="tab" data-tab="shipping">Shipping & Returns</div>
                <div class="tab" data-tab="reviews">Reviews (2)</div>
            </div>
            
            <div class="tab-content active" id="details">
                <p>Our premium streetwear t-shirt is designed for comfort and style. Made from a blend of high-quality cotton and polyester, this t-shirts provides warmth without being too heavy. It features a classic design with a front pocket, adjustable drawstrings, and ribbed cuffs and waistband for a secure fit.</p>
                <p>Perfect for casual outings, street photography sessions, or just lounging at home. The unisex design makes it suitable for everyone who appreciates quality streetwear.</p>
            </div>
            
            <div class="tab-content" id="specs">
                <table class="specs-table">
                    <tr>
                        <td>Material</td>
                        <td>80% Cotton, 20% Polyester</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td>450 g/m²</td>
                    </tr>
                    <tr>
                        <td>Care Instructions</td>
                        <td>Machine wash cold, tumble dry low</td>
                    </tr>
                    <tr>
                        <td>Country of Origin</td>
                        <td>South Africa</td>
                    </tr>
                    <tr>
                        <td>SKU</td>
                        <td>RM-SW-HD-001</td>
                    </tr>
                </table>
            </div>
            
            <div class="tab-content" id="shipping">
                <div class="shipping-info">
                    <h4>Shipping Information</h4>
                    <ul>
                        <li>Free manual delivery for people in 45km radius</li>
                        <li>Standard delivery: 3-5 business days</li>
                        <li>Express delivery available at additional cost</li>
                        <li>We ship nationwide across South Africa</li>
                    </ul>
                    
                    <h4>Returns Policy</h4>
                    <p>We offer a 30-day return policy for unworn items with original tags attached. Return shipping is free for defective items. For size exchanges, please contact our customer service team.</p>
                </div>
            </div>
            
            <div class="tab-content" id="reviews">
                <div class="reviews-container">
                    <div class="review">
                        <div class="review-header">
                            <span class="reviewer-name">Thabo M.</span>
                            <span class="review-date">October 15, 2023</span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>Absolutely love this t-shirt! The quality is exceptional and it's so comfortable. Perfect for our Johannesburg weather.</p>
                    </div>
                    
                    <div class="review">
                        <div class="review-header">
                            <span class="reviewer-name">Lerato K.</span>
                            <span class="review-date">October 10, 2023</span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Great shirt, true to size. The material is thick and warm. Would recommend sizing up if you prefer a looser fit.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="related-products">
            <h2>You Might Also Like</h2>
            <div class="related-products-grid">
                <div class="related-product">
                    <img src="img/product2.jpg" alt="Related Product 1">
                    <div class="related-product-info">
                        <h3 class="related-product-title">Graphic T-Shirt</h3>
                        <p class="related-product-price">R449.99</p>
                    </div>
                </div>
                
                <div class="related-product">
                    <img src="img/product3.jpg" alt="Related Product 2">
                    <div class="related-product-info">
                        <h3 class="related-product-title">Baseball Cap</h3>
                        <p class="related-product-price">R249.99</p>
                    </div>
                </div>
                
                <div class="related-product">
                    <img src="img/product4.jpg" alt="Related Product 3">
                    <div class="related-product-info">
                        <h3 class="related-product-title">Baseball Cap</h3>
                        <p class="related-product-price">R249.99</p>
                    </div>
                </div>
                
                <div class="related-product">
                    <img src="img/product5.jpg" alt="Related Product 4">
                    <div class="related-product-info">
                        <h3 class="related-product-title">Premium Hoodie</h3>
                        <p class="related-product-price">R899.99</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer Section-->
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-column">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Return Policy</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Follow Us</h4>
                <ul class="social-links">
                    <li><a href="#" target="_blank"><i class="bi bi-facebook"></i> Facebook</a></li>
                    <li><a href="#" target="_blank"><i class="bi bi-instagram"></i> Instagram</a></li>
                    <li><a href="#" target="_blank"><i class="bi bi-x"></i> X</a></li>
                    <li><a href="#" target="_blank"><i class="bi bi-youtube"></i> YouTube</a></li>
                </ul>
            </div>


            <div class="footer-column">
                <h4>Subscribe</h4>
                <p>Simply enter your email below:</p>
                <form class="subscribe-form">
                    <input type="email" placeholder="example.one@gmail.com">
                    <button type="submit">Subscribe</button>
                </form>
                <p class="privacy-text">
                    By subscribing, you agree to receive emails from us and acknowledge our Privacy Policy.
                </p>
            </div>
        </div>
    </footer>

     <script src="../scripts/productView.js"></script>
</body>
</html>