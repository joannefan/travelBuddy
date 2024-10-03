<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT-Serif">
  <link rel="stylesheet" href="public/css/form.css">
  <title>Contact</title>
  <style type="text/css">
  </style>
  <script>
    /*
    If no phone number provided at all, nothing to validate. 
    but if provided, ensure it is in one of the following formats: 
    XXXXXXXXXX
    XXX-XXX-XXXX
    XXX.XXX.XXXX
    XXX XXX XXXX
    */
    function validatePhone() {
      const phone = document.getElementById("phone").value;
      if (phone == "") {
        return true;
      } else {
        return phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/);
      }
    }

    function validateEmail() {
      const email = document.getElementById("email").value;
      console.log(email);
      return email.match(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i);
    }

    function validate() {
      reqFields = {
        fname: "First Name",
        lname: "Last Name",
        email: "Email",
        message: "Message",
      };
      let err = "";
      for (const id in reqFields) {
        if (document.getElementById(id).value == "") {
          err += reqFields[id] + " is required.<br />";
        }
      }

      if (!validatePhone()) {
        err += "Invalid phone number.<br />";
      }
      if (!validateEmail()) {
        err += "Email format does not match <em>username@domain.tld</em><br />";
      }

      if (err != "") {
        document.getElementById('error').innerHTML =
          "ERRORS:<br/>" + err;
        return false;
      }

      alert("Thank you for reaching out. We received your message and will respond within 2 business days.");
      return true;
    }
  </script>
</head>

<body>
  <?php
  include 'shared/navbar.php';
  include 'shared/functions.php';

  createHeroSection('public/images/contact-bg.jpg', 'Blue walkway/alley in Santorini, Greece', 'Contact Us');
  ?>

  <div class="form-container">
    <p class="form-instruction">If you have any questions or need help, please fill out the form below.</p>
    <form onsubmit="return validate()" method="#" action="#">
      <div class="form-group">
        <input type="text" name="first" id="fname" class="form-control" placeholder="First name*" required />
      </div>
      <div class="form-group">
        <input type="text" name="last" id="lname" class="form-control" placeholder="Last Name*" required />
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required />
      </div>
      <div class="form-group">
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" />
      </div>
      <div class="form-group">
        <select name="query" id="queryType" class="form-control" required>
          <option value="" disabled selected>Select a Purpose</option>
          <option value="donation">Product/Service Question</option>
          <option value="opportunities">Feature Request</option>
          <option value="programs">Advertising</option>
          <option value="collab">Business Inquiry</option>
          <option value="feedback">General Question</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <textarea id="message" class="form-control" placeholder="Message*" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="submit-btn" value="Submit" />
        <div id="error">&nbsp;</div>
      </div>
    </form>
  </div>


  <?php include 'shared/footer.php'; ?>
</body>

</html>