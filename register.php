<?php
require('fonts.php');
require('header.php');
require_once 'portal/models/connection.php';
require_once 'portal/controllers/parent.controller.php';
require_once 'portal/models/parent.model.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration</title>
  <meta property="og:title" content="registration - Honored Incomparable Stork" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }

    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-gray-black);
      background-color: var(--dl-color-gray-white);

    }

    #password-error,
    #confirm-error {
      color: red;
      font-size: 0.8rem;
      margin-top: 5px;
    }

    #password-error {
      display: block;
    }

    #confirm-error {
      display: block;
    }
  </style>

  <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
  <style>
    @keyframes fade-in-left {
      0% {
        opacity: 0;
        transform: translateX(-20px);
      }

      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }
  </style>
</head>

<body>
  <link rel="stylesheet" href="./css/style.css" />
  <div>
    <link href="./css/registration.css" rel="stylesheet" />
    <link href="./css/index.css" rel="stylesheet" />

    <div class="registration-container">

      <div class="registration-hero">
        <div class="heroContainer registration-hero1">
          <div class="registration-container1">
            <h1 class="registration-hero-heading heading1">
              Create an account with us and admit your kids&nbsp;
            </h1>
            <span class="registration-hero-sub-heading bodyLarge">
              <span>
                <span>

                  <span></span>
                </span>
                <span>
                  <span></span>
                  <span></span>
                </span>
              </span>
              <span>
                <span>
                  <span></span>
                  <span></span>
                </span>
                <span>
                  <span></span>
                  <span></span>
                </span>
              </span>
            </span>
            <div class="registration-container2">
              <form method="post" class="registration-form">
                <div class="registration-container3">
                  <input type="text" placeholder="Enter your Full name" id="name" name="name" required="true" class="registration-textinput input" />
                  <input type="text" placeholder="Enter your email" name="email" required="true" class="registration-textinput1 input" />
                  <input type="tel" placeholder="Enter your phone number" name="phone" id="phone" required="true" minlength="10" maxlength="13" class="registration-textinput2 input" />
                  <input type="text" placeholder="Enter address/location" id="address" name="address" required="true" class="registration-textinput3 input" />
                  <input type="password" placeholder="Enter your Password" id="password" name="password" required="true" minlength="8" class="registration-textinput4 input" />
                  <input type="password" placeholder="Confirm your password" id="cpassword" name="cpassword" required="true" class="registration-textinput5 input" />
                  <button type="submit" id="register" name="register" class="registration-button button">
                    <span id="register" class="registration-text14">
                      <span>Register</span>
                      <br />
                    </span>
                  </button>
                </div>
                <?php
                $createUser = new parentController(); // create a user object to handle the creation of users.
                $createUser->addparent();
                ?>
              </form>
              <div id="password-error"></div>
            </div>
          </div>
        </div>
      </div>
      <?php
      require('footer.php');
      ?>
    </div>
  </div>
  <script data-section-id="navbar" src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
</body>

</html>


<script>
  function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;

    // Check password length
    if (password.length < 8) {
      document.getElementById("password-error").innerHTML = "Password must be at least 8 characters long.";
    } else {
      document.getElementById("password-error").innerHTML = "";
    }

    // Check password match
    if (password !== confirmPassword) {
      document.getElementById("confirm-error").innerHTML = "Passwords do not match.";
    } else {
      document.getElementById("confirm-error").innerHTML = "";
    }
  }

  // Add event listeners to password and confirm password fields
  document.getElementById("password").addEventListener("keyup", validatePassword);
  document.getElementById("cpassword").addEventListener("keyup", validatePassword);
</script>