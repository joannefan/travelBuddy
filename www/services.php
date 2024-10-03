<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Subscription Homepage</title>
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <style>
    li {
      list-style: none;
    }
  </style>
</head>

<body>
  <?php include 'shared/navbar.php'; ?>

  <header class="hero-section">
    <!-- Image spanning the entire page -->
    <img src="public/images/services-bg.jpg" alt="Hero Image">
    <div class="hero-text">Our Services</div>
  </header>
  <br />

  <div class="maintxt">

    <section class="parasection">
      <div class="textsection">
        <h2>What do we offer?</h2>
        <p>Let us help you plan your perfect vacation! Using our services will allow for you to gain the vacation of
          your dreams without the stress of planning, just give us your dream destination and we'll do the rest. After
          specifying your travel destination, you can also customize further by genre of events you'd like us to
          reccommend. If you want food we will give you a list of amazing restaurants and cafes, if you want the
          ultimate sightseeing experience we will provide you tourist attractions, and so many more categories to
          choose from.</p><br />

        <p><i><strong>Our offerings include 3 special packages to choose from!</strong></i></p>
        <p style="text-align: left; list-style: none;">
          <li>Basic: Flights &amp; hotels</li>
          <li>Gold: Flights, hotels, &amp; attractions</li>
          <li>Premium: Flights, hotels, attractions, &amp; food</li>
        </p>
        <br />
      </div>

      <a href="catalog.php">
        <button>Plan Your Trip Today</button>
      </a>
    </section>

    <footer class="footer">
      <div class="left">
        <!-- Contact Information -->
        <p>Contact Us</p>
        <p>Email: contact@travelbuddy.com</p>
        <p>Phone: +123456789</p>
      </div>
      <div class="social-icons">
        <!-- Social Media Icons -->
        <a href="#" class="icon instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="icon facebook"><i class="fa fa-facebook"></i></a>
      </div>
      <div class="right">
        <!-- Copyright Statement -->
        <p>&copy; 2023 </p>
        <p>Travel Buddy</p>
        <p>All rights reserved.</p>
      </div>
    </footer>
  </div>
</body>

</html>
