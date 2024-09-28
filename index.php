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
  <title>Curfew e-Pass Management System - Modern UI</title>

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

    .navbar-nav .nav-link:hover {
      color: #ffdd57;
    }

    .navbar .btn-outline-light {
      transition: background-color 0.3s ease;
    }

    /* Hero Section Styling */
    .hero-section {
      background-color: #282c34;
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
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .hero-section p {
      font-size: 1.25rem;
      font-weight: 400;
      margin-bottom: 2rem;
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
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
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
  <div class="hero-section">
    <div>
      <h1 class="fade-in">Welcome to Curfew e-Pass System</h1>
      <p class="fade-in">Search, manage, and review your curfew e-pass efficiently.</p>
    </div>
  </div>
  <!-- Hero Section End -->

  <!-- Search Section Start -->
  <section class="search-section">
    <h3>Find Your Pass</h3>
    <form method="post">
      <div class="input-group">
        <input type="text" name="searchdata" id="searchdata" class="form-control" placeholder="Enter Your Pass ID" required>
        <button type="submit" name="search" class="btn btn-primary mt-3">Search Pass</button>
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

  <!-- Footer Start -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Curfew e-Pass Management System Created by 
      <strong>Vanshika Kandalgaonkar</strong></p>
      
      <div class="social-media">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
