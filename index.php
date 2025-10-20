
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require_once '../backend/config/db.php'; // this must return a $pdo connection

//$customerID = $_SESSION['customerID'] ?? null;

$customerID = "ava199905kha";
if (!$customerID) {
  echo "<p class='alert alert-danger'>You must be logged in to view purchases.</p>";
  exit;
}


?>
<!doctype html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Run Midrand</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="../frontend/styles/index.css" />
    <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/navbar.css" />
    <link rel="stylesheet" href="../frontend/styles/Reuseable Styles/footer.css" />
    <!-- Bootstrap CSS (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap bundle (includes Popper) — place before your custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--Nav Bar-->
    <!--Nav Bar-->
    <nav class="navbar" id="mainNav">
        <div class="navbar-container">
            <a class="navbar-brand" href="#"> <img src="../frontend/images/logo-black.png" id="navbar-brand-img"> </a>
                <!-- Navbar Toggler -->
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
                    
                    <!-- Settings Icon -->
                    
                    <!-- Settings Dropdown -->
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-gear"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            <li><a class="dropdown-item" href="profile.php" id="profileLink">Profile</a></li>
                            <li><a class="dropdown-item" href="reviews.php" id="purchasesLink">Purchases</a></li>
                        </ul>
                    </li>
                    
                    <!-- Show Purchases (and allow leaving a review)-->
                    

                    
                    <!-- Cart Icon -->
                    <li class="nav-item"><a class="nav-link" href="#cart"><i class="bi bi-cart"></i></a></li>
                </ul>
                <input type="search" placeholder="Search for products or services"> </div>
        </div>
    </nav>
    
    <!-- Scripts for  Navbar & Modal JS -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Mobile navbar toggle
            document.getElementById("navbarToggler").addEventListener("click", function () {
                document.getElementById("navbarNav").classList.toggle("active");
            });
            // Show purchases section
            document.getElementById("purchasesLink").addEventListener("click", function (e) {
                e.preventDefault();
                const purchasesSection = document.getElementById("purchasesSection");
                purchasesSection.classList.remove("d-none");
                window.scrollTo({
                    top: purchasesSection.offsetTop - 50
                    , behavior: "smooth"
                });
            });
            // Placeholder for Profile
            document.getElementById("profileLink").addEventListener("click", function (e) {
                e.preventDefault();
                alert("Profile section coming soon...");
            });
            // Pass product ID into modal
            document.querySelectorAll(".leave-review-btn").forEach(btn => {
                btn.addEventListener("click", function () {
                    document.getElementById("modalProductId").value = this.dataset.productId;
                });
            });
        });
    </script>
    <!--Hero Section-->
    <section id="hero">
        
        <div class="hero-bg"> <img src="../frontend/images/models/homepagebackground.jpg" alt="Background Image" /> </div>
        <div class="hero-content">
            <h1><i>RUN WITH THE NAME.</i></h1>
            <p>Comfortable Streetwear | Videography | Photography | Quality Soundhire</p> <a class="btn" role="button" href="shop.html">Shop</a> </div>
    </section>
    <!--Services Section-->
    <section id="services">
        <div class="services-container">
            <div class="service-tile" id="streetwear"> <img src="../frontend/images/services/homepagestreetwear.jpg" alt="Streetwear Background" />
                <div class="service-content">
                    <h2>Streetwear</h2>
                    <p>Where culture meets style</p>
                </div>
            </div>
            <div class="service-tile" id="soundhire"> <img src="../frontend/images/services/homepagesoundhire.jpg" alt="Sound Hire Background" />
                <div class="service-content">
                    <h2>Sound Hire</h2>
                    <p>We bring you sound that moves people</p>
                </div>
            </div>
            <div class="service-tile" id="photography"> <img src="../frontend/images/services/homepagephotography.jpg" alt="Photography Background" />
                <div class="service-content">
                    <h2>Photography</h2>
                    <p>We frame your story perfectly</p>
                </div>
            </div>
            <div class="service-tile" id="videography"> <img src="../frontend/images/services/homepagevideographyy.jpg" alt="Videography Background" />
                <div class="service-content">
                    <h2>Videography</h2>
                    <p>Stories captured in motion</p>
                </div>
            </div>
        </div>
    </section>
    <!--About Section-->
    <section id="about">
        <div class="about-container">
            <div class="about-image"><img src="../frontend/images/models/about.jpg" alt="About Runmidrand" /></div>
            <div class="about-content">
                <h2>ABOUT</h2>
                <p> Runmidrand Entertainment is a creative hub that combines fashion, photography, videography, and sound hire services into one powerful brand. Founded in 2017 by Lebogang Charles Chiloane and Sibonelo Phakathi, our vision is to unite communities, empower the youth, and create opportunities through events and culture. From our unique streetwear collection to professional media services and high-quality sound equipment rentals, we bring style, creativity, and reliability to every project. Whether you're planning an event, capturing memories, or shopping the latest looks, Runmidrand is here to make your experience seamless, modern, and unforgettable. </p> <a href="about.html" class="read-more-btn">READ MORE</a> </div>
        </div>
    </section>
    <!--Just-Landed Section-->
    <section id="just-landed">
        <div class="just-landed-container">
            <h2>JUST LANDED</h2>
            <p class="subtitle"> Level up your style. Explore the newest arrivals in our exclusive streetwear collection. </p>
            <div class="carousel">
                <button class="carousel-btn prev-btn"><i class="bi bi-arrow-left"></i></button>
                <div class="carousel-track-container">
                    <div class="carousel-track">
                        <div class="carousel-slide"><img src="img/justlanded1.jpg" alt="New Arrival 1" /></div>
                        <div class="carousel-slide"><img src="img/justlanded2.jpg" alt="New Arrival 2" /></div>
                        <div class="carousel-slide"><img src="img/justlanded3.jpg" alt="New Arrival 3" /></div>
                        <div class="carousel-slide"><img src="img/justlanded4.jpg" alt="New Arrival 4" /></div>
                        <div class="carousel-slide"><img src="img/justlanded5.jpg" alt="New Arrival 5" /></div>
                    </div>
                </div>
                <button class="carousel-btn next-btn"><i class="bi bi-arrow-right"></i></button>
            </div> <a href="shop.html" class="shop-now-btn">SHOP NOW</a> </div>
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
                    <li> <a href="https://www.facebook.com/share/1F6BhNZzE8/?mibextid=wwXIfr" target="_blank"><i class="bi bi-facebook"></i> Facebook</a
                            >
                        </li>
                        <li>
                            <a href="#https://www.instagram.com/runmidrand?igsh=MTQzYXJrZDV2aWR1Nw==" target="_blank"
                                ><i class="bi bi-instagram"></i> Instagram</a
                            >
                        </li>
                        <li>
                            <a href="#" target="_blank"><i class="bi bi-x"></i> X</a> </li>
                    <li> <a href="#" target="_blank"><i class="bi bi-youtube"></i> YouTube</a> </li>
                </ul>
            </div>
            <!-- Newsletter -->
            <div class="footer-column">
                <h4>Subscribe to Our Newsletter</h4>
                <p>Simply enter your details below:</p>
                <form class="subscribe-form" method="POST" action="pages/newsletter.php" onsubmit="return validateEmail(this)">
                    <input type="text" name="name" placeholder="Your name (optional)" />
                    <input type="email" name="email" placeholder="example.one@gmail.com" required />
                    <button type="submit">Subscribe</button>
                </form>
                <p class="privacy-text"> By subscribing, you agree to receive emails from us and acknowledge our Privacy Policy. </p>
            </div>
            <script>
                function validateEmail(form) {
                    const email = form.email.value.trim();
                    if (!email) {
                        alert("Please enter your email.");
                        return false;
                    }
                    return true;
                }
            </script>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../frontend/scripts/small-device-toggle menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
