<?php
$upcomingTrips = TableHelper::getAllObjectsByArea('public');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Trips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!--    <link rel="stylesheet" href="/css/style.css">-->

        <style>
        body{
            background-color: #f4f4f4;
        }
        /* Full-width button style */
        .btn-join {
            background-color: #03c03c; /* Custom green color */
            color: #fff;
            border: none;
            width: 100%;
            text-align: center;
        }
        .btn-join:hover {
            background-color: #16a34a;
            color: #fff;
        }
        /* Uniform card height */
        .card {
            height: 100%;
        }
        /* Light background for date and available places */
        .card-text.bg-light {
            background-color: #E0E7FF;
            font-weight: bold;
        }
        .card-title {
            font-weight: bold;
            text-align: center;
        }
        /* Footer background */
        .footer {
            background-color: #f8f9fa; /* Light gray */
            border-top: 1px solid #dee2e6; /* Subtle top border */
        }

        /* Text color */
        .footer p {
            color: #6c757d; /* Muted dark gray */
        }

        /* Icon color and hover effect */
        .footer-icon i {
            transition: color 0.3s;
        }

        .footer-icon i:hover {
            color: #28a745; /* Light green hover */
        }
        /* Fade out animation */
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        /* Apply animation when hiding */
        .fade-out {
            animation: fadeOut 1s forwards;
        }
    </style>
</head>
<body>
<header class="header position-relative">
    <!-- Background Image -->
    <div class="bg-image position-absolute w-100 h-100"
         style="background-image: url('images/berlin.jpg'); background-size: cover; background-position: center; opacity: 0.8;"></div>

    <!-- Overlay -->
    <div class="bg-overlay position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4);"></div>

    <!-- Header Content -->
    <div class="container position-relative text-white py-5">
        <div class="row align-items-center">
            <!-- Title -->
            <div class="col-md-8 text-center text-md-start">
                <h1 class="display-4 fw-bold">Day Trips Berlin</h1>
                <p class="lead">Discover Berlin and beyond with our unique day trips!</p>
            </div>

            <!-- Buttons -->
            <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">

                <?php if (isset($userRole) && $userRole === 'admin') {
                    echo '<a href="index.php?action=showList&area=trip" class="btn btn-outline-light me-2">Admin</a>';}
                ?>
                <a href="index.php?action=login&area=public" class="btn btn-outline-light me-2">Login</a>
                <a href="index.php?action=register&area=public" class="btn btn-outline-light me-2">Register</a>
            </div>
        </div>
    </div>
</header>
<!-- Successful application message -->
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div id="success-alert" class="text-center p-3 mt-3" style="background-color: #e6ffe6; color: #03c03c; border: none;">
        Success! Your application was received, and we’ll be in touch soon!
    </div>
<?php endif; ?>
<main class="container my-5">
    <h2 class="text-center mb-4">Upcoming Trips</h2>
    <p class="text-center mb-4">Join us for unforgettable trips around Berlin and beyond!</p>

    <section class="trip-list row justify-content-center">
        <!-- Loop through each upcoming trip -->
        <?php foreach ($upcomingTrips as $u): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" style="min-height: 450px;">
                    <img src="images/<?php echo strtolower(str_replace(' ', '-', $u->getTrip()->getDestination())); ?>.jpg"
                         alt="<?php echo $u->getTrip()->getDestination(); ?>" class="card-img-top rounded"
                         style="max-height: 200px; object-fit: cover;"
                         onerror="this.onerror=null; this.src='images/default.jpg';">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center font-weight-bold"><?php echo $u->getTrip()->getDestination(); ?></h5>
                        <p class="card-text bg-light text-center py-2 rounded" style="background-color: #e0f7fa;">
                            Date: <?php echo $u->getTripDate(); ?>
                        </p>
                        <p class="card-text text-center py-2 rounded" style="background-color: #E0E7FF;">
                            Available Places: <?php echo $u->getAvailablePlaces(); ?>
                        </p>
                        <p class="card-text"><?php echo $u->getTrip()->getDescription(); ?></p>
                        <a href="index.php?action=showForm&area=public&tripId=<?php echo $u->getId(); ?>" class="btn btn-join mt-auto w-100">Join Trip</a>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>


<footer class="footer text-center py-4 bg-light text-dark">
    <div class="container">
        <!-- Footer Text -->
        <p class="mb-3 text-muted">Berlin &copy; 2024</p>

        <!-- Social Icons -->
        <div>
            <a href="mailto:info@company.com" class="footer-icon mx-3 text-muted fs-4 text-decoration-none"
               aria-label="Email">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="tel:+1234567890" class="footer-icon mx-3 text-muted fs-4 text-decoration-none" aria-label="Phone">
                <i class="fas fa-phone-alt"></i>
            </a>
            <a href="https://www.instagram.com/yourprofile"
               class="footer-icon mx-3 text-muted fs-4 text-decoration-none" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</footer>
<script>
    setTimeout(function() {
        const alert = document.getElementById("success-alert");
        if (alert) {
            // Add the fade-out class to start the animation
            alert.classList.add("fade-out");

            // Remove the alert from the DOM after the animation completes
            setTimeout(() => alert.style.display = "none", 1000); // 1 second = duration of fadeOut animation
        }
    }, 5000);
</script>

</body>
</html>
