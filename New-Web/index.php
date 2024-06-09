<?php
session_start();

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user_system";

// Attempt to establish connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proceed with your query
$sql = "SELECT * FROM products"; // Adjust this query based on your database schema and requirements
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GREENS | Ecomerce Website Design </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts.js" defer></script>
    <script src="nav.js" defer></script>
</head>

<body>
    <?php
        include 'nav.php';
    ?>
    <!-- <div id="loading-screen">
    <div class="loader"></div>
    <p>Loading...</p>
</div> -->

<div class="loader__wrap" id="loading-screen" role="alertdialog" aria-busy="true" aria-live="polite" aria-label="Loading…">
	<div class="loader" aria-hidden="true">
		<div class="loader__sq"></div>
		<div class="loader__sq"></div>
	</div>
</div>



        <!-- <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="">Home</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="">Account</a></li>
                    </ul>
                </nav>

                <img src="images/cart.png" width=30px height=30px>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">



            </div>
            
      

        </div> -->




        <div class="row_for_start" style="margin-top: 100px">
            <div class="col-2 for_main" style="position: relative; z-index: 1; color: #f5f5f5">
                <h1>Build Your Dream SetUp<br>With Us!</h1>
                <p>Succes isn't about greatness. It's about consistency. Consistent<br>hard work gains succes.
                    Greatness
                    will come.</p>
                <a href="#" class="btn">Explore Now &#10148;</a>
            </div>
            <section class="pen">
		<div class="stage">
			<div class="element michael"></div>
			<div class="element franklin"></div>
			<div class="element trevor"></div>
		</div>
	</section>
        </div>
        
    </div>
    </div>

    <!---------- featured categories ---------->
    <div class="categories">
        <div class="small-container">
            <div class="row1">
                <div class="col-3">
                    <img src="images/category-1.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-2.jpg">
                </div>
                <div class="col-3">
                    <img src="images/category-3.jpg">
                </div>
            </div>
        </div>
    </div>
    <!------- featured products -------->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <!-- <div class="row">
            <div class="col-4">
                <img src="images/product-1.jpg">
                <h4>HyperX Alloy Origin Mini</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$115.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-2.jpg">
                <h4>HyperX Cloud 2 Wireless</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$155.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-3.jpg">
                <h4> HypeX Quadcast S</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$175.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-4.jpg">
                <h4>Zowie EC2-A White</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$96.00</p>
            </div>
        </div> -->

        <div class="row_for_card">
    <?php include 'card.php'; ?>
</div>
        <h2 class="title">ROG Products</h2>
        <div class="row1">
            <div class="col-4">
                <img src="images/product-5.jpg">
                <h4>Asus ROG Strix Delta RGB</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$250.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-6.jpg">
                <h4>Asus ROG Strix Gladius III</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$120.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-7.jpg">
                <h4>Asus ROG Strix XG32VQ</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$799.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-8.jpg">
                <h4>Asus ROG Health Mouse Mat</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$19.90</p>
            </div>
            <div class="col-4">
                <img src="images/product-9.jpg">
                <h4>Asus ROG Strix Claymore: Keyboard</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$135.50</p>
            </div>
            <div class="col-4">
                <img src="images/product-10.jpg">
                <h4>Asus ROG Strix Flare RGB: Keyboard</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$150.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-11.jpg">
                <h4>ASUS ROG Strix Scope RGB TKL Electro Punk Mechanical Gaming Keyboard</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>$130.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-12.jpg">
                <h4>Asus ROG STRIX IMPACT II Kablosuz 16.000 DPI Gaming Mouse</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$89.00</p>
            </div>
        </div>
    </div>
    <!---------- Offer ---------->
    <!-- <div class="offer">
        <div class="small-container">
            <div class="row1">
                <div class="col-2">
                    <img src="images/exclusive.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusively Available on GREENS</p>
                    <h1>Samsung Odyssey G9</h1>
                    <small>Samsung Odyssey G9 49” 240Hz 1ms DQHD Monitor
                        Display type: 5120×1440 Maximum refresh rate: 240Hz
                        1000R, the new apex of curved screen technology, matches
                        the contours of the human eye for unimaginable realism.
                        QLED, HDR1000, and DQHD resolution come together for
                        spectacular colours with total depth and detail.
                        The glossy white exterior meets Infinity Core Lighting Design.
                        The two come together to create a futuristic
                        effect that inspires you to shine tomorrow.
                        40Hz RapidCurve, 1ms response time, and G-Sync compatibility raise you to the top of your
                        game.</small>
                    <br>
                    <a href="" class="btn"> Buy Now &#10148;</a>
                </div>
            </div>
        </div>
    </div> -->
    <div class="testimonials" id="test">
    <?php
    include './testimonials.php';
?>
    </div>


<?php
    include './submit_testimonial.php';
?>
    <!------- testimonial --------->
    <!-- <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consequatur nemo facilis praesentium velit dignissimos deleniti
                        esse rem blanditiis recusandae nam quaerat, modi necessitatibus
                        laborum aliquid iusto officiis nihil totam quas.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-1.png">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consequatur nemo facilis praesentium velit dignissimos deleniti
                        esse rem blanditiis recusandae nam quaerat, modi necessitatibus
                        laborum aliquid iusto officiis nihil totam quas.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/user-2.png">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Consequatur nemo facilis praesentium velit dignissimos deleniti
                        esse rem blanditiis recusandae nam quaerat, modi necessitatibus
                        laborum aliquid iusto officiis nihil totam quas.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <img src="images/user-3.png">
                    <h3>Mabel Joe</h3>
                </div>
            </div>
        </div>
    </div> -->

    
    <!------- brands -------->
    <!-- <div class="brands">
        <div class="small-container">
            <div class="row1">
                <div class="col-5">
                    <img src="images/logo-godrej.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-oppo.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-coca-cola.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-philips.png">
                </div>
            </div>
        </div>
    </div> -->
    <!------ footer ------->
    <div class="footer">
        <div class="container">
            <div class="row1">
                <div class="footer-col-1">
                    <h3> Download Our App</h3>
                    <p>Download App for Android and IOS Mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and
                        Benefits of Sports Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="releasedate">Release Date 2022, 16th December.</p>
        </div>
    </div>
    <!--------- js for toggle menu ---------->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

<script>
$(document).ready(function() {
    $(".add-to-cart").click(function() {
        var productId = $(this).data("product-id");

        $.ajax({
            type: "POST",
            url: "add_to_cart.php",
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    $("#cart-count").text(response.cart_count);
                } else {
                    console.error("Failed to add item to cart:", response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error adding item to cart:", error);
            }
        });
    });
});

window.onload = function() {
    // Hide the loading screen
    document.getElementById("loading-screen").style.display = "none";
};

</script>
</body>

</html>