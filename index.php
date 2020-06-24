<!-- <!DOCTYPE html> -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Swagatam</title>
    <link rel="stylesheet" href="Resources/FrontEnd/css/style.css" />
    <link rel="stylesheet" href="Vendors/css/node_modules/normalize.css" />
    <link rel="stylesheet" href="Resources/FrontEnd/css/vendor/col.css" />
    <link rel="stylesheet" href="Resources/FrontEnd/css/vendor/4cols.css" />
    <link rel="stylesheet" href="Resources/FrontEnd/css/vendor/2cols.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="Resources/FrontEnd/js/script.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  </head>
  <body>
    <header>
      <video id="videoBG" autoplay muted loop>
        <source src="Resources/FrontEnd/img/visitNepal.mp4" type="video/mp4" />
      </video>
      <nav class="navbar">
        <div class="row">
          <div class="logo">
            <img
              src="Resources/FrontEnd/css/img/swagatamLogoWhite.png"
              alt="Swagatam-logo"
              class="logo-img"
            />
            <span class="logo-text">Swagatam</span>
          </div>
          <ul class="main-nav">
            <!-- <li><a href="section-places">Featured Places</a></li>
            <li><a href="#">How we work</a></li> -->
            <li><a href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a></li>
          </ul>
        </div>
      </nav>
      <div class="hero-text-box">
        <h1>
          Heaven is a Myth, <br />
          Nepal is Real
        </h1>
        <a class="btn btn-primary" href="login.php">Get Started</a>
        <!-- <a class="btn btn-secondary" href="#">Show More</a> -->
      </div>
    </header>
    <section class="section-features">
      <div class="row">
        <h2 style="color: rgb(34, 34, 34);letter-spacing: 3px;">
          &nbsp wherever you &nbspgo &mdash; go with your heart
        </h2>
        <p class="long-copy">
          Swagatam, we’re your premium travelling managing service. We know
          you’re always busy. No time for planning trips. So let us take care of
          that, we’re really good at it, we promise!
        </p>
      </div>
      <div class="row">
        <div class="col span_1_of_4 box">
          <i class="fa fa-clock-o icon-big"></i>
          <h3>24 Hours service</h3>
          <p>
            Travel worry-free knowing that we're here if you need us, 24 hours a
            day
          </p>
        </div>
        <div class="col span_1_of_4 box">
          <i class="fa fa-map-marker icon-big"></i>
          <h3>Max Coverage</h3>
          <p>
            Over 1,000 hotels in more than 80 cities and regions & flights to
            over 50 cities
          </p>
        </div>
        <div class="col span_1_of_4 box">
          <i class="fa fa-money icon-big"></i>
          <h3>Fair pricing</h3>
          <p>
            With 500+ suppliers, Swagatam.com can save you more!
          </p>
        </div>
        <div class="col span_1_of_4 box">
          <i class="fa fa-heart icon-big"></i>
          <h3>I becomes We</h3>
          <p>
            We connect Travelers to create a unique travel experience
          </p>
        </div>
      </div>
    </section>
    <section class="section-places">
      <ul class="places-showcase clearfix">
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/1.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/3.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/4.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/5.jpg" alt="Rara lake" />
          </figure>
        </li>
      </ul>
      <ul class="places-showcase clearfix">
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/2.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/6.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="FrontEnd/img/8.jpg" alt="Rara lake" />
          </figure>
        </li>
        <li>
          <figure class="place-photo">
            <img src="Resources/FrontEnd/img/7.jpg" alt="Rara lake" />
          </figure>
        </li>
      </ul>
    </section>
    <section class="section-steps">
      <div class="row">
        <h2>How it works &mdash; Simple as 1,2,3</h2>
      </div>
      <div class="row">
        <div class="col span_1_of_2 steps-box">
          <img
            src="Resources/FrontEnd/css/img/swagatamLogoBlack.png"
            alt="App"
            class="app-screen"
          />
        </div>
        <div class="col span_1_of_2 steps-box">
          <div class="works-step">
            <div>1</div>
            <p>Choose the Subscription plan that best fits your needs</p>
          </div>
          <div class="works-step">
            <div>2</div>
            <p>Choose the Subscription plan that best fits your needs</p>
          </div>
          <div class="works-step">
            <div>3</div>
            <p>Choose the Subscription plan that best fits your needs</p>
          </div>
          <!-- <a href="#" class="btn-app">
            <img
              src="FrontEnd/css/img/download-app.svg"
              alt="App Store Button"
            />
          </a>
          <a href="#" class="btn-app">
            <img
              src="FrontEnd/css/img/download-app-android.png"
              alt="Google Play Store Button"
            />
          </a> -->
        </div>
      </div>
    </section>
    <!-- <section class="section-cities">
      <div class="row">
        <h2>We're currently in these cities</h2>
      </div>
      <div class="row">
        <div class="col span_1_of_4 box">
          <img src="FrontEnd/css/img/lisbon-3.jpg" alt="Libson" />
          <h3>Kathmandu</h3>
          <div class="city-feature">
            <i class="fa fa-male"></i>
            500+ happy visitors
          </div>
          <div class="city-feature">
            <i class="fa fa-star"></i>
            60+ prof clients
          </div>
          <div class="city-feature">
            <i class="fa fa-male"></i>
            500+ happy visitors
          </div>
        </div>
      </div>
    </section> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </body>
</html>
