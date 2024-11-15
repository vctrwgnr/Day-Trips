<?php
//$upcomingTrips = TableHelper::getAllObjectsByArea('public');
$upcomingTripDataExists = (isset($a) && $a->getId() !== null) ? true : false;
$a = (!$upcomingTripDataExists) ? new Applicant() : $a;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Trip Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <style>
        .message {
            background-color: #ffe6e6;
            color: salmon;
            font-size: 20px;
            text-align: center;
            /*border: 2px solid black;*/
            padding: 5px;
            visibility: visible;
        }
    </style>
</head>
<body>
<div class="message"><?php echo $message; ?></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Dynamically show the trip destination in the heading -->
            <h3 class="text-center mt-5">Join Trip to <?php echo (new UpcomingTrip())->getObjectById($tripId)->getTripDestination(); ?></h3>
            <form action="index.php" method="post" class="mt-3">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                <input type="hidden" name="area" value="<?php echo $area; ?>">
                <input type="hidden" name="applicantId" value="<?php echo ($a instanceof Applicant && $upcomingTripDataExists) ? $a->getId() : ''; ?>">
                <input type="hidden" name="upcomingTripId" value="<?php echo (new UpcomingTrip())->getObjectById($tripId)->getId(); ?>">
                <input type="hidden" name="tripId" value="<?php echo htmlspecialchars($tripId); ?>">


                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input name="firstName" class="form-control" value="">
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input name="lastName" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" type="email" class="form-control" value="">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-info me-2" value="Apply for Trip">
                    <a href="index.php?action=showPublic&area=public" class="btn btn-info me-2">Go Back</a>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const message = document.querySelector('.message');
    message.style.visibility = message.innerHTML.trim() ? "visible" : "hidden";
</script>


</body>
</html>
