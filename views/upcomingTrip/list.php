<?php include 'views/header.php'; ?>
    <div class="container-fluid">
    <h3>Upcoming Trips</h3>
<table class="table table-hover">
    <tr>

        <th>Destination</th>
        <th>Date</th>
        <th>Available Places</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($upcomingTrips as $u ) :
        ?>
        <tr>
            <td><?php echo $u->getTrip()->getDestination(); ?></td>
            <td><?php echo $u->getTripDate(); ?></td>
            <td><?php echo $u->getAvailablePlaces(); ?></td>
            <td><a href="index.php?action=showForm&area=upcomingTrip&id=<?php echo $u->getId(); ?>"><button class="btn btn-info">Edit</button></a></td>
            <td><a href="index.php?action=delete&area=upcomingTrip&id=<?php echo $u->getId(); ?>"><button class="btn btn-info" onclick="return confirm('Are you sure you want to delete this?');">Delete</button></a></td>

        </tr>
        <?php
    endforeach;
    ?>
</table>
    </div>
<?php include 'views/footer.php'; ?>