<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: account.php");
  exit;
}

// Include config file
require_once "config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter email.";
  } else {
    $username = trim($_POST["username"]);
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  if (empty($username_err) && empty($password_err)) {
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = $username;

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();

              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: account.php");
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      mysqli_stmt_close($stmt);
    }
  }

  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <style>
    .btn {
      display: inline-block;
      align-content: center;
      text-align: center;
      background-color: #79adc0;
      color: rgb(255, 255, 255);
      font-size: 22px;
      font-weight: 800;
      padding: 10px;
      border-radius: 20px;
      border: none;
      cursor: pointer;
      transition: transform 0.3s, background-color 0.3s;
    }

    /* Hover effect */
    .btn:hover {
      background-color: #4e92a6;
      transform: scale(1.1);
      color: white;
    }
  </style>
</head>

<body>
  <?php
  echo '<nav class="navbar">
    <ul class="nav-links">
        <li><a href="services.html">Our Services</a></li>
        <li><a href="catalog.php">Plan Your Trip</a></li>
        <li><a href="index.html" class="logo"></a></li>
        <li><a href="story.html">Our Story</a> </li>
        <li><a href="contact.html">Contact Us</a></li>
    </ul>
    <div class="user-icon">
        <a href="login.php"><i class="fa fa-user" style="font-size:36px; color:white;"></i></a>
    </div>
    </nav>
    <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">☰ Menu</button>
        <div id="dropdownContent" class="dropdown-content">
            <a href="index.html">Home</a>
            <a href="services.html">Our Services</a>
            <a href="catalog.php">Plan Your Trip</a>
            <a href="story.html">Our Story</a>
            <a href="contact.html">Contact Us</a>
            <a href="login.php">Login</a>
        </div>
    </div>';
  ?>
  <header class="hero-section">
    <img src="images/login-bg.jpg" alt="Sky-level view of the top of mountains and clouds">
    <div class="hero-text">Login
      <p style="font-size:16px;">Please fill in your credentials to login.</p>

      <?php
      if (!empty($login_err)) {
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }
      ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
          <label style="font-size:30px;">Email</label>
          <input type="text" style="padding:5px;" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <span style="font-size:16px;" class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
          <label style="font-size:30px;">Password</label>
          <input type="password" style="padding:5px;" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
          <span style="font-size:16px;" class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn" value="Login">
        </div>
        <p style="font-size:30px;">Don't have an account? <a href="register.php">Sign up now</a>.</p>
      </form>
    </div>
  </header>

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
