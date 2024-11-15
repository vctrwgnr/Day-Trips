<?php
$upcomingTripDataExists = (isset($u) && $u->getId() !== null) ? true : false;
$u = (!$upcomingTripDataExists) ? new UpcomingTrip() : $u;
?>
<?php include 'views/header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5"><?= isset($id) ? 'Edit Upcoming Trip' : 'Create Upcoming Trip'; ?></h3>
            <form action="index.php" method="post" class="mt-3">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                <input type="hidden" name="area" value="<?php echo $area; ?>">
                <input type="hidden" name="id" value="<?php echo ($u instanceof UpcomingTrip && $upcomingTripDataExists === true) ? $u->getId() : ''; ?>">

                <div class="mb-3">
                    <label for="destination" class="form-label">Destination:</label>
                    <?php echo $u->getPossibleDestinations(); ?>
                </div>

                <div class="mb-3">
                    <label for="tripDate" class="form-label">Date:</label>
                    <input name="tripDate" type="date" class="form-control" value="<?php echo ($u instanceof UpcomingTrip && $upcomingTripDataExists === true) ? $u->getTripDate() : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="availablePlaces" class="form-label">Number of Available Places:</label>
                    <input type="number" id="availablePlaces" name="availablePlaces" class="form-control" value="<?php echo ($u instanceof UpcomingTrip && $upcomingTripDataExists === true) ? $u->getAvailablePlaces() : ''; ?>">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-info me-2" value="Save">
                    <input type="reset" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'views/footer.php'; ?>
