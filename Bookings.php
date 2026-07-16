<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.145.0">
    <title>Bookings</title>

    <!-- Bootstrap 5.3.3 CSS (official CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="theme-color" content="#712cf9">
    
    <style>
        .pricing-header {
            padding: 3rem;
            margin-bottom: 2rem;
        }
        .form-container {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .result-field {
            font-weight: bold;
        }
        .result-section {
            display: none; /* Hide result section initially */
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
    <div class="container py-5">
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-3 fw-bold text-body-emphasis">Book Your Adventure!</h1>
            <p class="fs-4 text-muted">Select a package, specify the number of people, and get a dynamic quote for your trip.</p>
        </div>

        <!-- Booking Form -->
        <div class="form-container">
            <form id="booking-form">
                <div class="mb-3">
                    <label for="package-select" class="form-label">Select a Package</label>
                    <select id="package-select" class="form-select" required>

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

                            // Fetch packages from the database
                            $get_packages = "SELECT package_name, cost, duration_days FROM holiday_packages";
                            $result = $mysqli->query($get_packages);

                            // Check for results
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['package_name'] . "' data-cost='" . $row['cost'] . "'>" . $row['package_name'] . " (" . $row['duration_days'] . ") - £" . $row['cost'] . " per adult</option>";
                                }
                            } else {
                                echo "<option value=''>No packages available</option>";
                            }

                            // Close connection
                            $mysqli->close();
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="num-adults" class="form-label">Number of Adults</label>
                    <input type="number" class="form-control" id="num-adults" value="1" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="num-children" class="form-label">Number of Children</label>
                    <input type="number" class="form-control" id="num-children" value="0" min="0" required>
                </div>

              
<button class="btn rounded-pill px-3" type="button" style="background-color: #2E4A2F; color: #fff;" onclick="calculateTotal()">Get a Quote</button>
<button class="btn btn-secondary rounded-pill px-3" type="button" onclick="resetForm()">Clear</button>
            </form>
        </div>

        <hr class="my-4">

        <h4 class="mb-3">Booking Summary</h4>
        <p class="lead">Please review your booking details below:</p>


        <!-- Results Section -->
        <div class="result-section">
            <div class="mb-3">
                <label for="subtotal" class="form-label">Subtotal (without VAT)</label>
                <input type="text" class="form-control result-field" id="subtotal" readonly>
            </div>

            <div class="mb-3">
                <label for="vat-amount" class="form-label">VAT Amount (15%)</label>
                <input type="text" class="form-control result-field" id="vat-amount" readonly>
            </div>

            <div class="mb-3">
                <label for="grand-total" class="form-label">Grand Total (Subtotal + VAT)</label>
                <input type="text" class="form-control result-field" id="grand-total" readonly>
            </div>
        </div>
    </div>

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

    <script type="text/javascript">
        function calculateTotal() {
            // Get the selected package and package cost
            const packageSelect = document.getElementById("package-select");
            const packageName = packageSelect.value;
            const packageCost = parseFloat(packageSelect.selectedOptions[0].getAttribute('data-cost'));

            // Get the number of adults and children
            const adults = parseInt(document.getElementById("num-adults").value);
            const children = parseInt(document.getElementById("num-children").value);

            // Calculate the adult cost (no discount)
            const adultCost = packageCost * adults;

            // Apply 30% discount on child cost (child ticket price is 30% off adult price)
            const childCost = packageCost - (packageCost * 0.3); // Subtract 30% discount from the full price
            const totalChildCost = childCost * children;

            // Subtotal calculation (Adult cost + Child cost)
            const subtotal = adultCost + totalChildCost;

            // Calculate VAT (15%)
            const vatAmount = subtotal * 0.15;

            // Calculate the Grand Total (Subtotal + VAT)
            const grandTotal = subtotal + vatAmount;

            // Update the fields with calculated values
            document.getElementById("subtotal").value = "£" + subtotal.toFixed(2);
            document.getElementById("vat-amount").value = "£" + vatAmount.toFixed(2);
            document.getElementById("grand-total").value = "£" + grandTotal.toFixed(2);

            // Display the results section
            document.querySelector(".result-section").style.display = "block";
        }
            function resetForm() {
        // Reset form inputs
        document.getElementById("package-select").selectedIndex = 0;  // Reset package selection to default
        document.getElementById("num-adults").value = 1;              // Reset number of adults to 1
        document.getElementById("num-children").value = 0;            // Reset number of children to 0

        // Reset result fields
        document.getElementById("subtotal").value = "";               // Clear the subtotal field
        document.getElementById("vat-amount").value = "";             // Clear the VAT field
        document.getElementById("grand-total").value = "";            // Clear the grand total field

        // Hide the result section again
        document.querySelector(".result-section").style.display = "none";
        }
    </script>

    <!-- Bootstrap 5.3.3 JS (official CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
