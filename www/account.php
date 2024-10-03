<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
  header("location: login.php");
  exit;
}

require_once "shared/db_conn.php";

$email = $_SESSION["username"];
$sql = "SELECT username, tripInfo FROM Trips";
$result = $conn->query($sql);

include 'shared/navbar.php';

echo '<header class="hero-section">
    <img
    src="public/images/login-bg.jpg"
    alt="Hero Image">
    <div class="hero-text">Account
    <p style="font-size:30px;"> Here are your previous trips!</p>';

//check to see if the emails match
$tripList = [];
$count = 0;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["username"] == $email) {
      $final = $row["tripInfo"];
      $tripList[] = $final;

      $count = $count + 1;
    }
  }

  $encodedTrips = json_encode($tripList);
}
if ($count == 0) {
  echo 'You have no records with us. <a href="catalog.php">Plan a trip today!</a>';
}
echo '</div><p><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p></header><br>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Account</title>
  <link href="public/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <style type="text/css">
    body {
      width: 100%;
      background-color: white;
      text-align: center;
      justify-content: center;
      align-items: center;
    }

    #cats-container h1 {
      margin-top: 50px;
      color: #FFA85C;
      text-align: center;
    }

    #cats-container h2 {
      margin: 10px 0px;
      color: #1C6B80;
      text-align: center;
      width: 100%;
    }

    #cats-container {
      display: block;
      width: 100%;
      margin: 0 auto;
      padding: 0px;
    }

    .catResults {
      width: 100%;
      padding: 10px 0px 30px 0px;
      margin: 0px;
      margin-bottom: 50px;
    }

    .catResults input[type='button'] {
      padding: 10px;
      display: inline-block;
      border-radius: 0;
      border: 1px solid grey;
      background-color: white;
    }

    .catResults input[type='button']:hover {
      cursor: pointer;
    }

    .panes {
      display: flex;
      flex-wrap: wrap;
      font-size: 20px;
      width: 100%;
      margin: 0 auto;
      overflow: scroll;
      overflow-x: hidden;
      height: 400px;
      background-color: white;
      justify-content: center;

    }

    /* hotels */
    #hotels {
      display: block;
      width: 100%;
      margin: 0 auto;
      padding: 0px;
    }

    #hotel-container {
      background-color: #79ADC0;
      width: 100%;
      padding: 10px 0px 30px 0px;
      margin: 0px;
      display: block;
      margin-bottom: 80px;
    }

    /* flights */
    #flights {
      display: block;
      width: 100%;
      margin: 0 auto;
      padding: 0px;
    }

    #flight-container {
      background-color: #79ADC0;
      width: 100%;
      padding: 10px 0px 30px 0px;
      margin: 0px;
      margin-bottom: 80px;
      display: block;
    }

    .place-info {
      text-align: left;
      display: block;
      font-size: 18px;
      padding: 10px;
      padding-bottom: 0px;
      border-radius: 20px;
      line-height: 1.5em;
      margin: 15px;
      width: 300px;
      display: block;
      background-color: aliceblue;
      pointer-events: all;
    }

    #cats-container a {
      text-decoration: none;
    }

    #cats-container a:hover {
      cursor: pointer;
      color: #b6a75e;
    }

    #cats-container ul {
      line-height: 1.8em;
      padding-left: 0px;
    }

    #cats-container ul li {
      margin: 20px 0px;
      list-style: none;
      line-height: 1.3em;
    }

    .place-name {
      font-weight: bold;
    }

    #cats-container b {
      font-family: PT Serif;
    }

    /* tag icon with text for labeling results */
    .tag-container {
      position: relative;
      display: inline-block;
    }

    .tag-container img {
      width: 100px;
    }

    .tag-container .tag-text {
      position: absolute;
      top: 40%;
      left: 60%;
      transform: translate(-50%, -50%);
      color: black;
      font-size: 16px;
      text-align: center;
    }
  </style>
</head>

<body>
  <div id="cats-container">
  </div>
  <script>
    const alltrips = <?= $encodedTrips ?>;
    const activitiesArr = [];

    $(document).ready(function() {
      let tripsHTML = "";
      let tripNum = 1;
      for (const tripDetails of alltrips) {
        console.log(tripDetails);
        let decodedDetails = $('<div/>').html(tripDetails).text();
        decodedDetails = decodedDetails.replace(/\?\?\?\?/g, '📍');

        tripsHTML += `<div class='catResults'><h2>Trip ${tripNum}</h2><div class='panes'>${decodedDetails}</div></div>`;

        tripNum += 1;
      }
      $("#cats-container").html(tripsHTML);
    });
  </script>
  <a href="logout.php" class="signOut"><button>Sign Out</button></a>
  <br><br>
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
</body>

</html>
