<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Buddy</title>
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <style>
    @media screen and (max-width: 768px) {
      .content {
        flex-direction: column;
        max-width: 90%;
        text-align: center;
      }

      .image {
        max-width: 90%;
      }

      .image img {
        height: 250px;
      }

      .content p {
        text-align: center;
      }

      .content h2 {
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <?php include 'shared/navbar.php'; ?>

  <header class="hero-section">
    <img src="public/images/index-bg.jpg" alt="Hero Image">
    <div class="hero-text">Travel Buddy</div>
  </header>
  <br /><br /><br />

  <div class="maintxt">

    <section class="section">
      <div class="content">
        <div class="text1">
          <h2>About Us</h2>
          <p>Travel Buddy started its journey because of our love for travel and a desire to simplify trip planning.
            Our mission is to make every trip an unforgettable adventure.</p>
        </div>
        <div class="image">
          <a href="story.php" class="img-link">
            <img src="public/images/story-bg.jpg" alt="Blue skyline image of tokyo">
          </a>
        </div>
      </div>
    </section>
    <br />

    <section class="section">
      <div class="content">
        <div class="image">
          <a href="catalog.php" class="img-link">
            <img src="public/images/plan-bg.jpg" alt="Overhead view of a beach shore, bright blue water">
          </a>
        </div>
        <div class="text2">
          <h2>Travel Packages</h2>
          <p> Get started on your next adventure! Explore our diverse range of travel subscription packages that offer
            varying services and experiences based on
            your preferences.</p>
        </div>
      </div>
    </section>

    <br />
    <section class="section">
      <div class="content">
        <div class="text1">
          <h2>Contact Us</h2>
          <p>Have inquiries or need assistance? Contact our support team!</p>
        </div>
        <div class="image">
          <a href="contact.php" class="img-link">
            <img src="public/images/contact-bg.jpg" alt="Blue walkway/alley in Santorini, Greece">
          </a>
        </div>
      </div>
    </section>
    <br />

    <section class="section">
      <div class="content">
        <div class="image">
          <a href="login.php" class="img-link">
            <img src="public/images/login-bg.jpg" alt="Sky-level view of the top of mountains and clouds">
          </a>
        </div>
        <div class="text2">
          <h2>Login</h2>
          <p>Returning member? Log-in <a class="inline-link" href="login.php">here!</a></p>
        </div>
      </div>
    </section>
    <br /><br />

    <footer class="footer">
      <div class="left">
        <!-- Contact Information -->
        <p>Contact Us</p>
        <p>Email: contact@travelbuddy.com</p>
        <p>Phone: +123456789</p>
      </div>
      <div class="social-icons">
        <!-- Social Media Icons -->
        <a href="https://www.instagram.com/" class="icon instagram"><i class="fa fa-instagram"></i></a>
        <a href="https://www.facebook.com/" class="icon facebook"><i class="fa fa-facebook"></i></a>
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
