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
    .text2 {
      font-size: 18px;
    }

    .image img {
      max-height: 400px;
    }

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

  createHeroSection("public/images/story-bg.jpg", "Blue skyline image of tokyo", "Our Story");
  ?>

  <br />

  <section class="section">
    <div class="content">
      <div class="image">
        <img src="public/images/sibling.jpg" alt="photo of cofounders with city landscape">
      </div>
      <div class="text2">
        <h2>Vacation Made Easy</h2>
        <p>
          Travel Buddy was founded out of frustration with the mess of travel websites, airlines, hotels, and
          itineraries all across different booking platforms. Our co-founder, Jane, was an excited college student ready
          to embark on her graduation trip - only to get lost in where to find
          the best deals and keep track of everything. Overwhelmed instead of excited to head off to a rewarding and
          relaxing trip, Jane turned to her brother Jake, who got to work on an easy, all-in-one place to store vacation
          plans.
        </p>
      </div>
    </div>
  </section>

  <div class="maintxt">
    <section class="parasection">
      <p>
        Today, our company has quickly grown to not only store vacation plans, but also build them to make life as
        easy as possible for our customers. We are a small but mighty team, still based in the family values of our
        founders.
      </p>
      <br />
      <p>
        All that to say, vacation should be easy and we're here to help to make it as seamless a process as
        possible. We're always here to help our customers get the best vacation experience possible, because we
        understand how frustrating planning can be. Contact us with any questions, comments, or feedback at all and a
        member of our team will get back to within 24 hours, guaranteed.
      </p>
    </section>

  </div>
  <?php include 'shared/footer.php'; ?>

</body>

</html>
