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
  <?php
  include 'shared/navbar.php';
  include 'shared/functions.php';

  createHeroSection("public/images/services-bg.jpg", "Hero Image", "Our Services");
  ?>
  <br />

  <div class="maintxt">

    <section class="parasection">
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

      <a href="catalog.php">
        <button>Plan Your Trip Today</button>
      </a>
    </section>

    <?php include 'shared/footer.php'; ?>
  </div>
</body>

</html>
