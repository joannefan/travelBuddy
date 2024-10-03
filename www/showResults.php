<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $email = $_POST['email'];
  $card = $_POST['card'];
  $package = $_POST['package'];

  $data_map = array();

  $skipKeys = array('fname', 'lname', 'email', 'card', 'package');

  foreach ($_POST as $key => $value) {
    if (!in_array($key, $skipKeys)) {
      $data_map[$key] = $value;
    }
  }

  // get values to be stored in database
  $data_arr = array_values($data_map);
  $tripInfo = implode('', $data_arr);
} else {
  // redirect if accessed directly without submitting the form
  // header('Location: catalog.php');
  // exit();
}

require_once "shared/db_conn.php";

$tripInfoText = htmlspecialchars($tripInfo, ENT_QUOTES, 'UTF-8');

// Performing insert query execution
$sql = "INSERT INTO Trips (username, tripInfo) VALUES ('$email', '$tripInfoText')";

if (!mysqli_query($conn, $sql)) {
  echo "ERROR: Sorry $sql. " . mysqli_error($conn);
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Results</title>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <link href="public/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <style type="text/css">
    body {
      width: 100%;
      background-color: white;
    }

    .page-title {
      margin-top: 50px;
      color: black;
      text-align: center;
    }

    .all-containers h2 {
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
      margin-bottom: 25px;
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
      background-color: white;
      width: 100%;
      padding: 10px 0px 30px 0px;
      margin: 0px;
      display: block;
      margin-bottom: 10px;
    }

    /* flights */
    #flights {
      display: block;
      width: 100%;
      margin: 0 auto;
      padding: 0px;
    }

    #flight-container {
      background-color: white;
      width: 100%;
      padding: 10px 0px 30px 0px;
      margin: 0px;
      margin-bottom: 10px;
      display: block;
    }

    .place-info {
      text-align: left;
      display: block;
      font-size: 18px;
      padding: 10px;
      padding-bottom: 0px;
      border-radius: 5px;
      line-height: 1.5em;
      margin: 10px;
      width: 300px;
      display: block;
      background-color: aliceblue;
      pointer-events: all;
    }

    .all-containers a {
      text-decoration: none;
    }

    .all-containers a:hover {
      cursor: pointer;
      color: #b6a75e;
    }

    .all-containers ul {
      line-height: 1.8em;
      padding-left: 0px;
    }

    .all-containers ul li {
      margin: 20px 0px;
      list-style: none;
      line-height: 1.3em;
    }

    .place-name {
      font-weight: bold;
    }

    .all-containers b {
      font-family: 'Courier New', Courier, monospace;
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
  <?php include 'shared/navbar.php'; ?>
  <div id="user-info"></div>

  <div id="flights">
    <div id='flight-container' class="all-containers">
      <h2>Flights you saved</h2>
      <div class="panes"></div>
    </div>
  </div>

  <div id="hotels">
    <div id='hotel-container' class="all-containers">
      <h2>Hotels you saved</h2>
      <div class="panes"></div>
    </div>
  </div>

  <div id="cats-container" class="all-containers">
    <div class='catResults' id='activity-container'>
      <h2>Activities you saved</h2>
      <div class="panes"></div>
    </div>
  </div>
  <script>
    const savedPanes = <?php echo json_encode($data_map); ?>;
    const package = <?php echo json_encode($package); ?>;

    const flightsArr = [];
    const hotelsArr = [];
    const activitiesArr = [];

    console.log(savedPanes);

    for (const key in savedPanes) {
      console.log(key);
      const value = savedPanes[key];

      if (key.startsWith("hotel")) {
        hotelsArr.push(value);
      } else if (key.startsWith("flight")) {
        flightsArr.push(value);
      } else if (key.startsWith("activity")) {
        activitiesArr.push(value);
      }
    }

    $(document).ready(function() {
      const userInfo = `<h1 class='page-title'>Your Saved Trip Ideas</h1>`;
      $("#user-info").html(userInfo);

      if (flightsArr.length == 0) {
        $(`#flight-container .panes`).html("You didn't save any flights.");
      } else {
        const flightsHtml = flightsArr.join('');
        $(`#flight-container .panes`).html(flightsHtml);
      }

      if (hotelsArr.length == 0) {
        $("#hotel-container .panes").html("You didn't save any hotels.");
      } else {
        const hotelsHtml = hotelsArr.join('');
        $("#hotel-container .panes").html(hotelsHtml);
      }

      if (activitiesArr.length == 0) {
        if (package == 'Basic') {
          $("#activity-container .panes").html("Activities are available on the gold or premium plan.");
        } else {
          $("#activity-container .panes").html("You didn't save any activities.");
        }
      } else {
        const activitiesHtml = activitiesArr.join('');
        $("#activity-container .panes").html(activitiesHtml);
      }
    });
  </script>
  <?php include 'shared/footer.php'; ?>
</body>

</html>
