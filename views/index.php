<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?= $appName ?>
  </title>
  <link rel="stylesheet" href="/public/style.css">
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/css/mdb.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
</head>

<body>
  <?php load('layouts.navbar') ?>

  <!-- Main -->
  <main>

    <!-- Header -->
    <header>
      <div class="p-5 text-center bg-image" style="
        background-image: url('/public/images/header.webp');
        height: 400px;
        overflow: hidden;
      ">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-2 mt-4">
                <?= $appName ?>
              </h1>
              <h4 class="mb-3">The PHP framework for backend developers</h4>
              <div class="row">
                <div class="alert alert-dark col-lg-12 col-md-12 col-sm-12" role="alert">
                  <h6 id="copy">composer create-project reactmvc/reactmvc myapp</h6>
                  <h6 id="copied" class="text-success mt-2" style="display: none;">Command copied to clipboard!</h6>
                </div>
              </div>
              <a class="btn btn-outline-light btn-lg" href="https://github.com/ReactMVC/ReactMVC" role="button">Fork on
                Github</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    
    <div class="container">
      <!-- About -->
      <section id="about">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 col-md-12 col-sm-12 mb-3 mt-5">
            <h2>About
              <?= $appName ?>
            </h2>
            <p>With the advancement of web technologies and the increasing popularity of the PHP programming language,
              the
              use of MVC-based frameworks for developing popular web applications has become widespread. In this
              context,
              we will introduce the ReactMVC framework for implementing the MVC architecture using PHP. ReactMVC is an
              open-source framework designed for web application development using PHP and the MVC architecture. This
              framework uses new and advanced features of PHP and helps developers easily and quickly implement their
              web
              applications with high speed. ReactMVC has several different layers of MVC, including the Model layer,
              View
              layer, and Controller layer. The Model layer contains information that the programmer needs to process
              application requests, the View layer is responsible for visualizing information for the user, and the
              Controller layer is responsible for guiding user requests. Using this framework, you can quickly and
              efficiently implement your web applications with high quality. Moreover, ReactMVC benefits from the
              progress
              made in the PHP project and is capable of competing with other PHP frameworks due to its performance
              improvement and speed increase. In addition, ReactMVC uses the Flux design pattern which is used to manage
              program data and establish communication between various components. With this pattern, programmers can
              easily manage program data and implement different parts of the program separately.</p>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 mb-3 mt-5 text-center" style="overflow: hidden;">
            <img src="/public/images/about.png" class="about-img" alt="contact">
          </div>
        </div>
      </section>

      <!-- Contact -->
      <section id="contact">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 col-md-12 d-none d-sm-block mb-3 mt-5 text-center">
            <img src="/public/images/contact.svg" class="contact-img" alt="contact">
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 mb-3 mt-5">
            <div class="text-center">
              <h1>Contact Form</h1>
              <p>Contact us through this form. Share your suggestions, criticisms, projects, etc. with us.</p>
            </div>
            <form method="post" id="contactForm" action="/send">
              <div class="form-outline mb-4">
                <input type="text" name="name" class="form-control" required />
                <label class="form-label">Name</label>
              </div>
              <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control" required />
                <label class="form-label">Email address</label>
              </div>
              <div class="form-outline mb-4">
                <textarea class="form-control" name="message" required rows="4"></textarea>
                <label class="form-label">Message</label>
              </div>
              <button type="submit" onclick="submitForm(event)" class="btn btn-primary btn-block mb-4">Send</button>
            </form>
            <div class="text-center">
              <h3 id="ok" class="text-success" style="display: none;">The message was sent</h3>
              <h3 id="error" class="text-danger" style="display: none;">Please fill in all required fields.</h3>
              <h3 id="email" class="text-danger" style="display: none;">Please enter a valid email address.</h3>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php load('layouts.footer') ?>


  <script type="text/javascript" src="/public/main.js"></script>
  <script type="text/javascript" src="/public/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="/public/js/mdb.min.js"></script>
</body>

</html>