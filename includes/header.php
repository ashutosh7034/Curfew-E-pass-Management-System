<!-- Include Bootstrap 5 and Animate.css CDN in the <head> of your HTML -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: transparent; transition: background 0.4s ease;">
      <div class="container">
        <!-- Logo and Brand -->
        <a class="navbar-brand logo_h animate__animated animate__fadeInDown" href="index.php">
          <h1 style="color: #fff; font-weight: bold; font-size: 2.5rem;">Curfew Pass Management System</h1>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links and Admin Login -->
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
              <a class="nav-link animate__animated animate__fadeIn" href="index.php" style="color: #fff; font-size: 18px; margin-right: 20px;">Home</a>
            </li>
          </ul>

          <!-- Admin Login Button -->
          <div class="nav-right text-center text-lg-right py-4 py-lg-0">
            <a class="btn btn-outline-light btn-sm animate__animated animate__fadeInRight" href="admin/" style="padding: 10px 20px; border-radius: 25px; font-weight: bold; transition: background-color 0.3s ease;">
              Admin Login
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>

<!-- Custom CSS for additional styling -->
<style>
  /* Fullscreen background image */
  body {
    background: linear-gradient(135deg, #6b73ff, #000dff); /* Gradient background */
    color: white;
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow-x: hidden;
  }

  /* Navbar Background Change on Scroll */
  .navbar.scrolled {
    background-color: rgba(28, 45, 66, 0.85); /* Semi-transparent background on scroll */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Adds shadow for depth */
  }

  /* Navbar Links */
  .nav-link {
    color: white !important;
    font-size: 18px;
    margin-right: 20px;
    transition: color 0.3s ease;
  }
  .nav-link:hover {
    color: #00d9ff !important; /* Light blue hover effect */
  }

  /* Admin Button */
  .btn-outline-light {
    border: 2px solid white;
    padding: 8px 20px;
    border-radius: 25px;
    transition: all 0.3s ease;
  }
  .btn-outline-light:hover {
    background-color: #fff;
    color: #2c3e50;
    border-color: #fff;
  }

  /* Responsive Logo Sizing */
  @media (max-width: 768px) {
    .navbar-brand h1 {
      font-size: 2rem;
    }
  }
</style>

<!-- Include Bootstrap 5 JS and jQuery (for animation purposes) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- Script to handle background change on scroll -->
<script>
  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('.navbar').addClass('scrolled');
      } else {
        $('.navbar').removeClass('scrolled');
      }
    });
  });
</script>
