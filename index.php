<?php
require('fonts.php');
require('header.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Swiss Daycare</title>
    <meta property="og:title" content="Swiss daycare" />
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
    <div>
      <link href="./css/index.css" rel="stylesheet" />

      <div class="home-container">
        <div class="home-hero">
          <div class="heroContainer home-hero1">
            <div class="home-container1">
              <h1 class="home-hero-heading heading1">
                Welcome to swiss bears Daycare 
              </h1>
              <span class="home-hero-sub-heading bodyLarge">
                <span>
                  <span>
                    <span>
                      Where your child's happiness and development come first
                    </span>
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
              <div class="home-btn-group">
                <button class="buttonFlat"><a href="about.php">Learn More&nbsp;→</a></button>
              </div>
            </div>
          </div>
        </div>
        <div class="home-features">
          <div class="featuresContainer">
            <div class="home-features1">
              <div class="home-container2">
                <span class="overline">
                  <span>features</span>
                  <br />
                </span>
                <h2 class="home-features-heading heading2">
                  Discover Our Exceptional Features
                </h2>
                <span class="home-features-sub-heading bodyLarge">
                  <span>
                    <span>
                      <span>
                        Explore what sets our daycare apart and ensures a
                        positive experience for your child
                      </span>
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
              </div>
              <div class="home-container3">
                <div class="featuresCard feature-card-feature-card">
                  <svg viewBox="0 0 1024 1024" class="featuresIcon">
                    <path
                      d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                    ></path>
                  </svg>
                  <div class="feature-card-container">
                    <h3 class="feature-card-text heading3">
                      <span>Age-Appropriate Curriculum</span>
                    </h3>
                    <span class="bodySmall">
                      <span>
                        Tailored programs for each age group to promote learning
                        and development
                      </span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <svg viewBox="0 0 1024 1024" class="featuresIcon">
                    <path
                      d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                    ></path>
                  </svg>
                  <div class="feature-card-container">
                    <h3 class="feature-card-text heading3">
                      <span>Experienced and Caring Staff</span>
                    </h3>
                    <span class="bodySmall">
                      <span>
                        Qualified educators who provide a safe and nurturing
                        environment for children
                      </span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <svg viewBox="0 0 1024 1024" class="featuresIcon">
                    <path
                      d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                    ></path>
                  </svg>
                  <div class="feature-card-container">
                    <h3 class="feature-card-text heading3">
                      <span>Engaging Activities</span>
                    </h3>
                    <span class="bodySmall">
                      <span>
                        Fun and educational activities that stimulate creativity
                        and social skills
                      </span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <svg viewBox="0 0 1024 1024" class="featuresIcon">
                    <path
                      d="M809.003 291.328l-297.003 171.819-297.003-171.819 275.456-157.397c4.779-2.731 9.899-4.48 15.147-5.333 9.301-1.451 18.987 0.128 27.904 5.291zM491.776 979.669c6.016 3.243 12.928 5.077 20.224 5.077 7.381 0 14.336-1.877 20.395-5.163 15.189-2.475 29.909-7.68 43.392-15.36l298.709-170.709c26.368-15.232 45.269-38.315 55.424-64.597 5.675-14.592 8.619-30.165 8.747-46.251v-341.333c0-20.395-4.821-39.723-13.397-56.917-0.939-3.029-2.219-5.973-3.883-8.832-1.963-3.371-4.267-6.357-6.912-8.96-1.323-1.835-2.731-3.669-4.139-5.419-9.813-12.203-21.845-22.528-35.456-30.507l-299.051-170.88c-26.027-15.019-55.467-19.84-83.328-15.531-15.531 2.432-30.507 7.637-44.288 15.488l-298.709 170.709c-16.341 9.429-29.824 21.888-40.149 36.267-2.56 2.56-4.864 5.547-6.784 8.832-1.664 2.901-2.987 5.888-3.925 8.96-1.707 3.456-3.243 6.955-4.608 10.496-5.632 14.635-8.576 30.208-8.704 45.995v341.632c0.043 30.293 10.581 58.197 28.331 80.128 9.813 12.203 21.845 22.528 35.456 30.507l299.051 170.88c13.824 7.979 28.587 13.099 43.605 15.445zM469.333 537.045v340.949l-277.12-158.336c-4.736-2.773-8.832-6.315-12.16-10.411-5.931-7.381-9.387-16.512-9.387-26.581v-318.379zM554.667 877.995v-340.949l298.667-172.757v318.379c-0.043 5.163-1.067 10.496-2.987 15.445-3.413 8.789-9.6 16.384-18.176 21.333z"
                    ></path>
                  </svg>
                  <div class="feature-card-container">
                    <h3 class="feature-card-text heading3">
                      <span>Nutritious Meals</span>
                    </h3>
                    <span class="bodySmall">
                      <span>
                        Healthy meals and snacks prepared on-site to support
                        children's well-being
                      </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="home-banner">
          <div class="bannerContainer home-banner1">
            <h1 class="home-banner-heading heading2">
              Providing Quality Care for Your Little Ones
            </h1>
            <span class="home-banner-sub-heading bodySmall">
              <span>
                <span>
                  <span>
                    At swiss bears Daycare, we offer a safe and nurturing
                    environment for children to learn, play, and grow. Our
                    experienced staff is dedicated to providing the best care
                    for your child's early years. We focus on educational
                    activities, social interaction, and fun experiences to
                    ensure your child's well-being and development.
                  </span>
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
            <button class="buttonFilled button"><a href="programs.php">Explore Our Programs</a></button>
          </div>
        </div>
        <div class="home-faq">
          <div class="faqContainer">
            <div class="home-faq1">
              <div class="home-container4">
                <span class="overline">
                  <span>FAQ</span>
                  <br />
                </span>
                <h2 class="home-text48 heading2">Common questions</h2>
                <span class="home-text49 bodyLarge">
                  <span>
                    Here are some of the most common questions that we get.
                  </span>
                  <br />
                </span>
              </div>
              <div class="home-container5">
                <div class="question1-container">
                  <span class="question1-text heading3">
                    <span>
                      What are the age groups accepted in your day care
                      programs?
                    </span>
                  </span>
                  <span class="bodySmall">
                    <span>We accept children from 6 weeks to 5 years old.</span>
                  </span>
                </div>
                <div class="question1-container">
                  <span class="question1-text heading3">
                    <span>
                      What are the operating hours of your day care center?
                    </span>
                  </span>
                  <span class="bodySmall">
                    <span>
                      Our operating hours are from 7:00 AM to 6:00 PM, Monday to
                      Friday.
                    </span>
                  </span>
                </div>
                <div class="question1-container">
                  <span class="question1-text heading3">
                    <span>Do you provide meals for the children?</span>
                  </span>
                  <span class="bodySmall">
                    <span>
                      Yes, we provide nutritious meals and snacks for the
                      children throughout the day.
                    </span>
                  </span>
                </div>
                <div class="question1-container">
                  <span class="question1-text heading3">
                    <span>
                      Are your staff members trained in CPR and first aid?
                    </span>
                  </span>
                  <span class="bodySmall">
                    <span>
                      Yes, all our staff members are trained in CPR and first
                      aid to ensure the safety of the children.
                    </span>
                  </span>
                </div>
                <div class="question1-container">
                  <span class="question1-text heading3">
                    <span>Do you offer part-time enrollment options?</span>
                  </span>
                  <span class="bodySmall">
                    <span>
                      Yes, we offer part-time enrollment options for families
                      who may not need full-time care.
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    require('footer.php');
    ?>
    <script
      data-section-id="navbar"
      src="https://unpkg.com/@teleporthq/teleport-custom-scripts"
    ></script>
  </body>
</html>
