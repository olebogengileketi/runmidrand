<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login </title>
    <!-- Boxicons CDN for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> <!--Bootstrap Icons-->
    
    <link href='../styles/login.css' rel='stylesheet' />
    <link href='../styles/Reuseable Styles/navbar.css' rel='stylesheet' />
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
            </div>
        </div>
    </nav>

    <!--Register Section-->
    <div class="container">

        <div class="image-section" aria-label="Signup illustration">
            <div class="image-section-content">
                <img src="../images/logo-black.png" class="image-section-img">
                <p>Don't have an account ?</p>
                <p class="sign-in"><a href="register.php">Register</a></p>
            </div>
        </div>

        <form class="form-section">
            <h2>Login</h2>
            <div class="form-columns">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Email -->
                    <div class="input-group">
                        <i class='bx bx-mail-send'></i>
                        <input type="email" placeholder="Email*" required />
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password*" required />
                    </div>
                    <a href="#" class="forgot-password-link">Forgot Password ?</a>

                    <!-- Keep Me logged in-->
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" id="termsCheck" required />
                        <label class="form-check-label" for="termsCheck">Keep me logged in</label>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                </div>

                <!-- Right Column -->
                <div class="right-column">
                <button type="submit" class="google-btn">
                    <i class="bi bi-google"></i> Google Login
                </button>
                <a href="register.php" class="dont-password-link">Don't have an account?</a>
                </div>
            </div>
            
        </form>
    </div>

</body>
</html>
