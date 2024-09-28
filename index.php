<?php
session_start();
include('includes/dbconnection.php');

// Check if admin is logged in
$isAdminLoggedIn = isset($_SESSION['cpmsaid']) && strlen($_SESSION['cpmsaid']) > 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curfew e-Pass Management System - Professional UI</title>

  <!-- Google Fonts for Modern Typography -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f5f7;
      color: #333;
      margin: 0;
      padding: 0;
      scroll-behavior: smooth;
    }

    /* Header Styling */
    .navbar {
      background-color: #007bff;
      padding: 15px 20px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      transition: background 0.4s ease;
    }

    .navbar-brand {
      color: #fff;
      font-size: 1.5rem;
      font-weight: 700;
    }

    .navbar-nav .nav-link {
      color: #fff;
      margin-right: 15px;
      transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
      color: #ffdd57;
    }

    .navbar .btn-outline-light {
      transition: background-color 0.3s ease;
    }

    /* Hero Section Styling */
    .hero-section {
      background-image: linear-gradient(to right bottom, #007bff, #00aaff);
      color: #ffffff;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
      margin-top: 56px; /* Offset to account for fixed header */
    }

    .hero-section h1 {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      animation: fadeInDown 1s ease;
    }

    .hero-section p {
      font-size: 1.25rem;
      font-weight: 400;
      margin-bottom: 2rem;
      animation: fadeInUp 1s ease;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Search Section Styling */
    .search-section {
      margin-top: -80px;
      background-color: #ffffff;
      padding: 40px 20px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
      position: relative;
      z-index: 1;
    }

    .search-section h3 {
      font-size: 1.8rem;
      font-weight: 500;
      margin-bottom: 1.5rem;
      color: #4a4a4a;
    }

    .search-section input {
      padding: 15px;
      font-size: 1rem;
      border-radius: 8px;
      border: 1px solid #d1d5db;
      width: 100%;
    }

    .search-section button {
      padding: 15px 30px;
      font-size: 1rem;
      border-radius: 8px;
      background-color: #007bff;
      color: #fff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .search-section button:hover {
      background-color: #0056b3;
    }

    /* Table Result Section */
    .results-section {
      margin-top: 40px;
    }

    .results-section table {
      width: 100%;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .results-section th, .results-section td {
      padding: 12px 15px;
      font-size: 1rem;
      color: #333333;
    }

    .results-section th {
      background-color: #007bff;
      color: #ffffff;
      font-weight: 500;
    }

    .results-section tr:nth-child(odd) {
      background-color: #f9f9f9;
    }

    /* About Section */
    .about-section {
  background-image: linear-gradient(to right bottom, #f0f8ff, #e6f7ff);
  padding: 80px 20px;
  border-radius: 15px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  max-width: 1000px;
  margin: 60px auto;
  text-align: center;
}

.about-section h2 {
  font-size: 2.5rem;
  font-weight: 700; /* Increased font weight for emphasis */
  margin-bottom: 1rem;
  color: #007bff;
  text-transform: uppercase; /* Added uppercase for a stronger impact */
}

.about-section p {
  font-size: 1.1rem;
  color: #666;
  margin-bottom: 1.5rem;
  line-height: 1.8; /* Increased line height for better readability */
}

.about-section .icon {
  font-size: 4rem; /* Increased icon size */
  color: #007bff;
  margin-bottom: 1rem;
  animation: bounce 1s infinite alternate; /* Added bounce animation */
}

.about-section .about-box {
  background-color: #ffffff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added box shadow transition */
}

.about-section .about-box:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
}

/* Bounce animation for the icon */
@keyframes bounce {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}


    /* Contact Section */
    .contact-section {
  background-image: linear-gradient(to right bottom, #007bff, #00aaff);
  padding: 80px 20px;
  border-radius: 15px;
  max-width: 1000px;
  margin: 60px auto;
  color: #ffffff;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.contact-section h2 {
  font-size: 2.5rem;
  font-weight: 600;
  margin-bottom: 1rem;
  animation: fadeInDown 0.5s ease forwards;
}

.contact-section p {
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 1.5rem;
  animation: fadeInUp 0.5s ease forwards;
}

.contact-section .form-control {
  padding: 15px;
  border-radius: 8px;
  border: none;
  margin-bottom: 15px;
  transition: border-color 0.3s ease;
  animation: fadeInUp 0.7s ease forwards;
}

.contact-section .form-control:focus {
  outline: none;
  border-color: #ffffff;
  box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
}

.contact-section .btn-primary {
  padding: 15px 30px;
  font-size: 1rem;
  border-radius: 8px;
  background-color: #ffffff;
  color: #007bff;
  border: none;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.contact-section .btn-primary:hover {
  background-color: #f0f8ff;
  transform: translateY(-2px);
}

#promptMessage {
  animation: fadeIn 0.5s ease forwards;
}

/* Animation Keyframes */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}


    /* Footer Styling */
    .footer {
      background-color: #333;
      color: #fff;
      padding: 30px 0;
      text-align: center;
      margin-top: 50px;
    }

    .footer p {
      margin: 0;
    }

    .footer a {
      color: #ffffff;
      margin: 0 15px;
      font-size: 1.2rem;
    }

    .footer a:hover {
      color: #cccccc;
    }

    /* Smooth animations */
    .fade-in {
      animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>

  <!-- Header Start -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Curfew e-Pass</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="admin/">Admin Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header End -->

  <!-- Hero Section Start -->
  <section class="hero-section" id="home">
    <div class="container">
      <h1>Welcome to the Curfew e-Pass Management System</h1>
      <p>Efficiently manage and track your curfew e-pass applications and status.</p>
      <a href="#about" class="btn btn-light btn-lg">Learn More</a>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Search Section Start -->
  <section class="search-section mt-5">
    <h3 class="text-center">Search Your Curfew e-Pass Status</h3>
    <form method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Enter Your Pass ID" name="searchdata" required>
        <button class="btn btn-primary" type="submit" name="search">Search</button>
      </div>
    </form>

    <?php
    if (isset($_POST['search'])) {
        $sdata = $_POST['searchdata'];
    ?>
    <div class="results-section mt-5">
      <h4 class="text-center">Results for "<?php echo htmlspecialchars($sdata); ?>"</h4>
      <table class="table mt-3">
        <?php
        $sql = "SELECT * FROM tblpass WHERE PassNumber LIKE :sdata";
        $query = $dbh->prepare($sql);
        $query->bindValue(':sdata', '%' . $sdata . '%', PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
          foreach ($results as $row) {
        ?>
        <tr>
          <th>Pass ID</th>
          <td><?php echo htmlspecialchars($row->PassNumber); ?></td>
        </tr>
        <tr>
          <th>Full Name</th>
          <td><?php echo htmlspecialchars($row->FullName); ?></td>
          <th>Contact Number</th>
          <td><?php echo htmlspecialchars($row->ContactNumber); ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?php echo htmlspecialchars($row->Email); ?></td>
          <th>Identity Type</th>
          <td><?php echo htmlspecialchars($row->IdentityType); ?></td>
        </tr>
        <tr>
          <th>Identity Card Number</th>
          <td><?php echo htmlspecialchars($row->IdentityCardno); ?></td>
          <th>Category</th>
          <td><?php echo htmlspecialchars($row->Category); ?></td>
        </tr>
        <tr>
          <th>From Date</th>
          <td><?php echo htmlspecialchars($row->FromDate); ?></td>
          <th>To Date</th>
          <td><?php echo htmlspecialchars($row->ToDate); ?></td>
        </tr>
        <tr>
          <th>Pass Creation Date</th>
          <td><?php echo htmlspecialchars($row->PasscreationDate); ?></td>
        </tr>
        <?php
          }
        } else {
        ?>
        <tr>
          <td colspan="6" class="text-center text-danger">No records found for this Pass ID</td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <?php } ?>
  </section>
  <!-- Search Section End -->

  <!-- About Section Start -->
  <section class="about-section" id="about">
  <div class="container">
    <div class="about-box fade-in">
      <i class="fa fa-info-circle icon"></i>
      <h2>About Us</h2>
      <p>The Curfew e-Pass Management System is a comprehensive solution designed to streamline the process of issuing and managing curfew passes during restrictions. Our goal is to provide an easy-to-use platform for citizens to apply for and track their passes, ensuring a smooth and efficient process for both applicants and authorities.</p>
    </div>
  </div>
</section>

  <!-- About Section End -->

<!-- Contact Section Start -->
<section class="contact-section" id="contact">
  <div class="container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <p class="text-center mb-5">Have questions or need support? We're here to assist you with any issues related to the curfew pass application or status tracking. Feel free to reach out!</p>
    
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="includes/save_contact.php" method="POST" id="contactForm">
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>
          </div>
          <div class="mb-3">
            <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
        </form>

        <!-- Prompt Container -->
        <div id="promptMessage" class="alert alert-success mt-3" style="display: none;"></div>
      </div>
    </div>
  </div>
</section>



  <!-- Contact Section End -->

  <!-- Footer Start -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Curfew e-Pass Management System Created by 
      <strong>Vanshika Kandalgaonkar</strong></p>
      <div class="social-media">
        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.in"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Smooth Scroll for Anchor Links -->
  <script>
    document.querySelectorAll('a.nav-link').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          e.preventDefault();
          window.scrollTo({
            top: target.offsetTop - 50, // Adjust to account for fixed navbar height
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>
</html>
