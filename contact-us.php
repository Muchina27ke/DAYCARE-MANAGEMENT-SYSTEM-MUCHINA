<?php
require('fonts.php');
require('header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>contact-us</title>
    <meta
      property="og:title"
      content="contact-us"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
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
    <link href="./css/index.css" rel="stylesheet" />
    <div>
      <link href="./css/contact-us.css" rel="stylesheet" />

      <div class="contact-us-container">
        <div class="contact-us-contactus faqContainer">
          <div class="contact-us-contact">
            <div class="contact-us-container1">
              <h2 class="contact-us-text heading2">Contact us</h2>
              <span class="contact-us-text1 bodyLarge">
                <span>For any query and concerns fill the submit the form</span>
                <br />
              </span>
            </div>
            <div class="contact-us-container2">
              <div class="contact-us-container3">
                <form
                  enctype="multipart/form-data"
                  method="post"
                  id="contact"
                  name="contact"
                  class="contact-us-form"
                >
                  <div class="contact-us-container4">
                    <input
                      type="text"
                      placeholder="Full name"
                      id="name"
                      name="name"
                      required="true"
                      class="contact-us-textinput input"
                    />
                    <input
                      type="email"
                      placeholder="Email"
                      id="email"
                      name="email"
                      required="true"
                      class="contact-us-textinput1 input"
                    />
                    <input
                      type="tel"
                      placeholder="Phone"
                      id="phone"
                      required="true"
                      class="contact-us-textinput2 input"
                    />
                    <input
                      type="text"
                      placeholder="Subject"
                      id="subject"
                      name="subject"
                      required="true"
                      class="contact-us-textinput3 input"
                    />
                    <textarea
                      placeholder="Message"
                      id="message"
                      name="message"
                      class="contact-us-textarea textarea"
                    ></textarea>
                    <button
                      type="submit"
                      id="submit"
                      name="submit"
                      class="contact-us-button button"
                    >
                      <span>
                        <span class="contact-us-text5">Submit</span>
                        <br />
                      </span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <?php
    require('footer.php')
    ?>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
