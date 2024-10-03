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
  <?php
  include 'shared/navbar.php';
  include 'shared/functions.php';

  createHeroSection('public/images/index-bg.jpg', 'Hero Image', 'Travel Buddy');
  ?>

  <div class="maintxt">
    <?php
    function createSection($title, $text, $imgSrc, $imgAlt, $link, $textClass)
    {
      $textBlock = '
            <div class="' . $textClass . '">
                <h2>' . $title . '</h2>
                <p>' . $text . '</p>
            </div>';

      $imageBlock = '
            <div class="image">
                <a href="' . $link . '" class="img-link">
                    <img src="' . $imgSrc . '" alt="' . $imgAlt . '">
                </a>
            </div>';

      if ($textClass == 'text1') {
        $content = $textBlock . $imageBlock;  // Text first
      } else {
        $content = $imageBlock . $textBlock;  // Image first
      }

      echo '
        <section class="section">
            <div class="content">
                ' . $content . '
            </div>
        </section>
        <br />';
    }
    ?>

    <?php
    // About Us Section
    createSection(
      'About Us',
      'Travel Buddy started its journey because of our love for travel and a desire to simplify trip planning. Our mission is to make every trip an unforgettable adventure.',
      'public/images/story-bg.jpg',
      'Blue skyline image of Tokyo',
      'story.php',
      'text1'
    );

    // Travel Packages Section
    createSection(
      'Travel Packages',
      'Get started on your next adventure! Explore our diverse range of travel subscription packages that offer varying services and experiences based on your preferences.',
      'public/images/plan-bg.jpg',
      'Overhead view of a beach shore, bright blue water',
      'catalog.php',
      'text2'
    );

    // Contact Us Section
    createSection(
      'Contact Us',
      'Have inquiries or need assistance? Contact our support team!',
      'public/images/contact-bg.jpg',
      'Blue walkway or alley in Santorini, Greece',
      'contact.php',
      'text1'
    );

    // Login Section
    createSection(
      'Login',
      'Returning member? Log-in <a class="inline-link" href="login.php">here!</a>',
      'public/images/login-bg.jpg',
      'Sky-level view of the top of mountains and clouds',
      'login.php',
      'text2'
    );
    ?>

    <?php include 'shared/footer.php'; ?>
  </div>
</body>

</html>
