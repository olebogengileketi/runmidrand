<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Signup </title>
    <!-- Boxicons CDN for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> <!--Bootstrap Icons-->
    
    <link href='../styles/register.css' rel='stylesheet' />
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
        <form class="form-section">
            <h2>Create an Account</h2>

            <div class="form-columns">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- First & Last Name -->
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="First name*" required />
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="Last name*" required />
                    </div>

                    <!-- Gender -->
                    <div class="input-group gender-group">
                        <label><input type="radio" name="gender" value="male" required /> Male</label>
                        <label><input type="radio" name="gender" value="female" /> Female</label>
                        <label><input type="radio" name="gender" value="other" /> Other</label>
                    </div>

                    <!-- Date of Birth -->
                    <div class="input-group">
                        <i class='bx bxs-calendar'></i>
                        <label for="dob" style="font-size: 14px;color: grey; margin-left: 40px;">Date of Birth*</label>
                        <input type="date" id="dob" placeholder="Date of Birth*" required />
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <i class='bx bx-mail-send'></i>
                        <input type="email" placeholder="Email*" required />
                    </div>

                    <!-- Phone -->
                    <div class="input-group">
                        <i class='bx bxs-phone'></i>
                        <input type="tel" placeholder="Phone Number*" required />
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password*" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Confirm Password*" required />
                    </div>
                </div>

                <!-- Right Column -->
                <div class="right-column">
                    <!-- Address -->
                    <div class="input-group">
                        <i class='bx bxs-home'></i>
                        <input type="text" placeholder="Street Address*" required />
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-building'></i>
                        <input type="text" placeholder="Apt, Suite" />
                    </div>

                    <!-- Population of Province and City -->
                    <!-- Province -->
                    <div class="input-group">
                        <i class='bx bxs-map'></i>
                        <select id="province" required>
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

                    <!-- City -->
                    <div class="input-group">
                        <i class='bx bxs-city'></i>
                        <select id="city" required>
                            <option value="">Select City*</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <input type="text" placeholder="Type your city/town if not listed above" required />
                    </div>

                    <div class="input-group">
                        <i class='bx bxs-map-pin'></i>
                        <input type="text" placeholder="ZIP Code*" required />
                    </div>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" id="termsCheck" required />
                <label class="form-check-label" for="termsCheck">
                I agree to the
                <a href="#" class="terms-link" id="termsLink" data-bs-toggle="modal" data-bs-target="#termsModal"> Terms and Conditions</a>
                </label>
            </div>

            <!-- Submit -->
            <button type="submit">Sign up</button>
        </form>


        <div class="image-section" aria-label="Signup illustration">
            <div class="image-section-content">
                <img src="../images/logo-black.png" class="image-section-img">
                <p>Already have an account ?</p>
                <p class="sign-in"><a href="login.php">Sign In</a></p>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions popup -->
    <div id="termsOverlay" role="dialog" aria-modal="true" aria-labelledby="termsTitle">
        <div id="termsModal">
            <h5 id="termsTitle">Terms and Conditions</h5>
            <h6>1. Introduction</h6>
            <p>By registering on RUNMIDRAND, you agree to abide by the following terms and conditions.</p>
            <h6>2. Privacy Policy</h6>
            <p>Your data will be protected and not shared with third parties without consent.</p>
            <h6>3. User Responsibilities</h6>
            <p>You agree to provide accurate information and keep your login details secure.</p>
            <h6>4. Limitation of Liability</h6>
            <p>RUNMIDRAND is not responsible for damages caused by misuse of this platform.</p>
            <div class="modal-buttons">
            <button id="printBtn" type="button">Print</button>
            <button id="closeBtn" type="button">Close</button>
            </div>
        </div>
    </div>


    <script src="../scripts/register.js"></script>
</body>
</html>
