
<!doctype html>
<html lang="en" data-bs-theme="auto">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.145.0">
    <title>Our Package</title>

    <!-- Bootstrap 5.3.3 CSS (official CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<meta name="theme-color" content="#712cf9">
<style>
    .card-header h4 {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

</style>
</head>

<body>
<header>

<nav class="navbar navbar-expand-lg" style="background-color: #94937A;">
        <div class="container">
          <!-- Logo -->
          <a class="navbar-brand text-white" href="homepage.html">
            <img src="assets/EcoVenture_Logo.png" alt="EcoVenture Logo" height="60">
          </a>
    
          <!-- Hamburger button -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <!-- Navbar links -->
          <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
            <ul class="navbar-nav text-center">
              <li class="nav-item px-3">
                <a class="nav-link text-white" href="packages.php">
                  <i class="bi bi-map-fill d-block fs-4"></i>
                  <small>Packages</small>
                </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link text-white" href="Bookings.php">
                  <i class="bi bi-calendar2-check d-block fs-4"></i>
                  <small>Booking</small>
                </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link text-white" href="Contact.html">
                  <i class="bi bi-envelope-fill d-block fs-4"></i>
                  <small>Contact Us</small>
                </a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link text-white" href="assets/36280755-MANG6531 Report.pdf" target="_blank">
                  <i class="bi bi-file-earmark-pdf-fill d-block fs-4"></i>
                  <small>Report</small>
                </a>
              </li> 
            </ul>
          </div>
        </div>
      </nav>

</header> 
<main>
<div class="container py-3">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal text-body-emphasis">Packages</h1>
      <p class="fs-5 text-body-secondary">Choose your perfect package for memorable experience!</p>
    </div>
  
  
    <?php
// Database connection settings
$host = "srv02958.soton.ac.uk";
$username = "MANG6531_student";
$password = "tintin6531";
$database = "mgmt_webapp_msc";

// Create connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL query
$get_packages = "SELECT package_name, package_details, cost, duration_days FROM holiday_packages";
$result = $mysqli->query($get_packages);

// Check for results
if ($result && $result->num_rows > 0) {
    echo "<div class='row row-cols-1 row-cols-md-3 mb-3 text-center'>";
    
    while ($row = $result->fetch_assoc()) {
        $name = $row['package_name'];
        $details = $row['package_details'];
        $cost = $row['cost'];
        $duration = $row['duration_days'];

        echo "
        <div class='col'>
          <div class='card mb-4 rounded-3 shadow-sm border-success'>
            <div class='card-header py-3 bg-success border-success'>
              <h4 class='my-0 fw-normal text-nowrap text-white'>$name</h4>
            </div>
            <div class='card-body'>
              <h2 class='card-title pricing-card-title'>&pound;$cost</h2>
              <ul class='list-unstyled mt-3 mb-4'>
                <li><strong>Duration:</strong> $duration</li>
                <li>$details</li>
              </ul>
              <a href='Bookings.php'>
              <button class= 'btn rounded-pill px-3' type='button' style='background-color: #2E4A2F; color: #fff'>Get a Quote</button>
              </a>
            </div>
          </div>
        </div>";
    }

    echo "</div>";
} else {
    echo "<p class='text-muted'>No packages available at the moment. Please check back later.</p>";
}

// Close connection
$mysqli->close();
?>
</div>

<div class="container py-5">
  <div class="row g-5 text-center">


    <div class="col">
      <img src="assets/backpack.webp" alt="Explore Places" class="mb-3" style="height: 80px;">
      <h3 class="fs-5 fw-bold text-uppercase">Explore Places You Couldn't Yourself</h3>
      <p>All trips are led by certified expert guides, unlocking new life experiences.</p>
    </div>

   
    <div class="col">
      <img src="assets/bump.webp" alt="Like-Minded Group" class="mb-3" style="height: 80px;">
      <h3 class="fs-5 fw-bold text-uppercase">Join Community</h3>
      <p>Travel along with your group members or solo.</p>
    </div>

   
    <div class="col">
      <img src="assets/Girl.webp" alt="Hassle Free" class="mb-3" style="height: 80px;">
      <h3 class="fs-5 fw-bold text-uppercase">Hassle-Free From Start to Finish</h3>
      <p>We've sorted the logistics, so you can just show up and have a blast in the wild.</p>
    </div>
  </div>
</div>


<section class="bg-dark text-white text-center d-flex align-items-center justify-content-center" style="background-image: url('assets/Group_Kayaking.webp'); background-size: cover; background-position: center; height: 40vh;">
  <div class="container">
    <h2 class="display-5 fw-bold">Ready for Adventure?</h2>
    <p class="lead">Join a trip that inspires, energizes, and reconnects you with nature.</p>
    <a href='Bookings.php'>
      <button class= 'btn rounded-pill px-3' type='button' style='background-color: #2E4A2F; color: #fff'>Get a Quote</button>
    </a>
  </div>
</section>
<div class="container text-center my-4">
  <p class="small text-muted">
    <em>
      “Note that this is a fictitious website that was developed by a student as part of a programming assignment.
      None of the content on this page is meant to be genuine nor should it be taken as such.”
    </em>
  </p>
</div>

</main>
<footer class="container py-5">
  <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">EcoVenture&copy; 2025 Company, Inc</p>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="packages.php" class="nav-link px-2 text-body-secondary">Packages</a></li>
      <li class="nav-item"><a href="Bookings.php" class="nav-link px-2 text-body-secondary">Bookings</a></li>
      <li class="nav-item"><a href="Contact.html" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
    </ul>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
