<?php
// session_start();

$buttonContent = '';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'example@example.com';
    $profileIcon = isset($_SESSION['profileIcon']) ? $_SESSION['profileIcon'] : './images/profile.png';
    $buttonContent = '
        <div class="profile-info" id="profileInfo">
            <img src="' . htmlspecialchars($profileIcon) . '" alt="Profile Icon">
            <div>' . htmlspecialchars($username) . '</div>
            <div class="dropdown-content" id="dropdownContent">
                <button onclick="window.location.href=\'account.php\'">Account</button>';

    // Check if user is admin
    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
        $buttonContent .= '<button onclick="window.location.href=\'admin.php\'">Admin</button>';
    }

    $buttonContent .= '<form action="logout.php" method="POST">
                    <button type="submit" name="logout">Sign Out</button>
                </form>
            </div>
        </div>';
} else {
    $buttonContent = '<button id="showRegistration">Registration</button>';

    $buttonContent .= '
    <div id="registrationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" id="closeRegistration">&times;</span>
            <div class="form-box">
                <h2>Registration</h2>
                <button id="showLoginInside">Sign In</button>
                <button id="showSignupInside">Sign Up</button>
            </div>
        </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">    
    <script src="nav.js"></script>
    <script src="scripts.js"></script>
</head>

<body>
    <div class="header" style="display: flex; justify-content: center;">
        <div class="nav-wrapper">
            <div class="grad-bar"></div>
            <nav class="navbar">
                <a href="index.php">
                    <img src="./images/logo.png" alt="Company Logo">

                </a>
                <div class="menu-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="nav no-search">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="#test">About</a></li>
                    <li class="nav-item"><a href="#">Work</a></li>
                    <li class="nav-item"><a href="#">Careers</a></li>
                    <li class="nav-item"><a href="contact.php">Contact Us</a></li>
                    <li class="nav-item">        <div class="cart-icon">
    <a href="view_cart.php">
    <a href="view_cart.php" class="cart-icon"><i class="fa fa-shopping-cart"></i></a>
    <span id="cart-count"><?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?></span>
    </a>
</div></li>
                    <li class="nav-item">
                        <div id="registration" class="main-container">
                            <div class="content">
                                <?php echo $buttonContent; ?>
                            </div>

                            <div id="registrationModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close" id="closeRegistration">&times;</span>
                                    <div class="form-box">
                                        <h2>Registration</h2>
                                        <button id="showLoginInside">Sign In</button>
                                        <button id="showSignupInside">Sign Up</button>
                                    </div>
                                </div>
                            </div>

                            <div id="loginModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close" id="closeLogin">&times;</span>
                                    <div class="form-box">
                                        <h2>Login</h2>
                                        <form id="loginForm" action="login.php" method="POST">
                                            <input type="text" name="username" placeholder="Username" required>
                                            <input type="password" name="password" placeholder="Password" required>
                                            <button type="submit">Login</button>
                                        </form>
                                        <button id="createAccountBtnLogin"
                                            style="background: transparent; color: green">Create Account</button>
                                    </div>
                                </div>
                            </div>

                            <div id="signupModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close" id="closeSignup">&times;</span>
                                    <div class="form-box">
                                        <h2>Sign Up</h2>
                                        <form id="signupForm" action="signup.php" method="POST">
                                            <input type="text" name="username" placeholder="Username" required>
                                            <input type="email" name="email" placeholder="Email" required>
                                            <input type="password" name="password" placeholder="Password" required>
                                            <button type="submit">Sign Up</button>
                                        </form>
                                        <button id="iGotAccountBtn" style="background: transparent; color: green">I got
                                            Account</button>
                                    </div>
                                </div>
                            </div>

                            <div id="myModal" class="modal"
                                style="display: <?php echo isset($message) || isset($error) ? 'block' : 'none'; ?>">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <?php if (isset($message)) { ?>
                                        <p><?php echo $message; ?></p>
                                    <?php } ?>
                                    <?php if (isset($error)) { ?>
                                        <p><?php echo $error; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>