<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../styles/Shop.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> <!--Bootstrap Icons-->
    <link rel="stylesheet" href="../styles/Reuseable Styles/navbar.css">
    <link rel="stylesheet" href="../styles/Reuseable Styles/footer.css">
    <script src="small-device-toggle-menu.js" defer></script>

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
            <input type="search" placeholder= "Search for products....">
        </div>
    </div>
</nav>



    <!-- Banner -->
    <section class="banner">
        <h1><em>Streetwear where culture meets style</em></h1>
    </section>

    <!-- Search and Filter -->
    <section class="filter_container">
            <select>
                <option value="Gender">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <select>
                <option value="Size">Size</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>

            <select>
                <option value="Shop_By_Size">Price</option>
                <option value="Low_to_High">Low to High</option>
                <option value="High_to_Low">High to Low</option>
            </select>

            <select>
                <option value="Colour">Colour</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Red">Red</option>
            </select>
            <select>
                <option value="Sales_Or_Offers">Sales & Offers</option>
                <option value="Discounted_Items">Discounted Items</option>
                <option value="Buy_One_Get_One">Buy One Get One</option>
                <option value="Clearance">Clearance</option>
            </select>
            <select>
                <option value="Availability">Availability</option>
                <option value="In_Stock">In Stock</option>
                <option value="Out_of_Stock">Out of Stock</option>
            </select>
    </section>

    <div id="product-list" class="product-grid">
        <!-- Product items will be dynamically generated here -->
    </div>

    <div id="pagination" class="pagination">
        <!-- Pagination links will be dynamically generated here -->
    </div>
    
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
            <li><a href="https://www.facebook.com/share/1F6BhNZzE8/?mibextid=wwXIfr" target="_blank"><i class="bi bi-facebook"></i> Facebook</a></li>
            <li><a href="#https://www.instagram.com/runmidrand?igsh=MTQzYXJrZDV2aWR1Nw==" target="_blank"><i class="bi bi-instagram"></i> Instagram</a></li>
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

</body>
</html>
