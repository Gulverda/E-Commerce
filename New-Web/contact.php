<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style.css">        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> GREENS | Ecomerce Website Design </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/447103a4d5.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <?php
                include 'nav.php';
            ?>

       <!---------------- contact section start --------------->
            <div class="sec" id="sec">
            <div class="contact-section">
                <div class="contact-info">
                    <div><i class="fas fa-map-marker-alt"></i>Address, City, Country</div>
                    <div><i class="fas fa-envelope"></i>contact@mail.com</div>
                    <div><i class="fas fa-phone"></i>+995 000 00-00-00</div>
                    <div><i class="fas fa-clock"></i>Mon -Fri 8:AM to 5:00 PM</div>
                </div>
                    <div class="contact-form">
                    <h2>Contact Us</h2>
                        <form class="contact" action=""method="post">
                        <input type="text" name="name" class="text-box" placeholder="Your Name" required>
                        <input type="email" name="email" class="text-box" placeholder="Your Email" required>
                        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                        <input type="submit" name="submit" class="send-btn" value="Send">
                    </form>
                </div>
            </div>
<!------- brands -------->
      <div class="brands">
        <div class="small-container">
            <div class="row">
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
    </div>

<!------ footer ------->
    <div class="footer">
        <div class="container">
            <div class="row">
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
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                    MenuItems.style.maxHeight = "200px";
            }
            else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>