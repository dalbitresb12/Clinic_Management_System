<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Clinic Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Clinic Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="nav-link text-light" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="doctor2.jpg" class="d-block w-100" alt="..." style="width: 1280px; height: 400px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block">
                  <h2>Welcome to Healthy Living</h2>
                  <p>Your Guide to Health, Wellness, and Vitality</p>
                  <button class="btn btn-danger">Health</button>
                  <button class="btn btn-primary">Wealthy</button>
                  <button class="btn btn-success">Fitness</button>
              </div>
          </div>
          <div class="carousel-item">
              <img src="1.jpg" class="d-block w-100" alt="..." style="width: 1280px; height: 400px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block">
                  <h2>The Best Wellness Blog</h2>
                  <p>Your Path to a Healthy and Happy Life</p>
                  <button class="btn btn-danger">Health</button>
                  <button class="btn btn-primary">Wealthy</button>
                  <button class="btn btn-success">Fitness</button>
              </div>
          </div>
          <div class="carousel-item">
              <img src="7.jpg" class="d-block w-100" alt="..." style="width: 1280px; height: 400px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block">
                  <h2>Award Winning Wellness Blog</h2>
                  <p>Empowering You to Lead a Healthier Life</p>
                  <button class="btn btn-danger">Health</button>
                  <button class="btn btn-primary">Wealthy</button>
                  <button class="btn btn-success">Fitness</button>
              </div>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container my-4 ml-10">
      <div class="row">
          <div class="col-lg-4">
              <img class="rounded-circle" src="6.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Patient</h2>
              <p>Get access to personalized health updates and tips for a better lifestyle and wellness.</p>
              <p><a class="btn btn-success" href="patient_login.php" role="button">Log in <<</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
              <img class="rounded-circle" src="r2.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Doctor</h2>
              <p>Access the latest medical research, treatment methods, to enhance your practice.</p>
              <p><a class="btn btn-info" href="Doctor_login.php" role="button">Log in <<</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
              <img class="rounded-circle" src="9.jpg" alt="Generic placeholder image" width="140" height="140">
              <h2>Admin</h2>
              <p>Manage healthcare systems, organize patient data, and oversee operational tasks efficiently.</p>
              <p><a class="btn btn-warning" href="admin_login.php" role="button">Log in <<</a></p>
          </div><!-- /.col-lg-4 -->
      </div>
  </div>
  

      <footer class="container my-5">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2024-2025 JCoder, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
      </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
