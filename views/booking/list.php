<?php include 'views/header.php'; ?>
<div class="container">
    <h3 class="text-center form-h1 my-4">Manage Applicants for Upcoming Trips</h3>
    <section class="trip-applicants-list">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="thead-dark">
                    <tr>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Available Places</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Approval</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Group bookings by upcomingTripId
                    $tripsWithBookings = [];
                    foreach ($bookings as $booking) {
                        $tripId = $booking->getUpcomingTrip()->getId();
                        $tripsWithBookings[$tripId][] = $booking;
                    }

                    // Loop through each trip with bookings
                    foreach ($tripsWithBookings as $tripId => $tripBookings):
                        $upcomingTrip = $tripBookings[0]->getUpcomingTrip(); // Get trip details from the first booking
                        ?>
                        <!-- Trip information row -->
                        <tr class="table-primary font-weight-bold">
                            <td><?php echo htmlspecialchars($upcomingTrip->getTrip()->getDestination()); ?></td>
                            <td><?php echo htmlspecialchars($upcomingTrip->getTripDate()); ?></td>
                            <td><?php echo htmlspecialchars($upcomingTrip->getAvailablePlaces()); ?></td>
                            <td colspan="4" class="text-center">Applicants</td>
                        </tr>

                        <!-- Loop through applicants for the current trip -->
                        <?php
                        $hasApplicants = false;
                        foreach ($tripBookings as $booking):
                            $applicant = $booking->getApplicant();
                            if ($applicant && $applicant->getFirstName() && $applicant->getLastName()): // Ensure valid applicant
                                $hasApplicants = true;
                                ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><?php echo htmlspecialchars($applicant->getFirstName() . ' ' . $applicant->getLastName()); ?></td>
                                    <td><?php echo htmlspecialchars($applicant->getEmail()); ?></td>
                                    <td><span class="status badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm approve-btn">Approve</button>
                                        <a href="index.php?action=delete&area=booking&id=<?php echo $booking->getId(); ?>">
                                            <button onclick="return confirm('Are you sure you want to delete this applicant?');" class="btn btn-danger btn-sm">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endif;
                        endforeach;

                        // If no applicants for this trip
                        if (!$hasApplicants):
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">No applicants for this trip</td>
                            </tr>
                        <?php endif; ?>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php include 'views/footer.php'; ?>
