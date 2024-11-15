<?php include 'views/header.php'; ?>
<div class="container-fluid">
<main>
    <h3>Trips</h3>

<table class="table table-hover">
    <tr>
        <th>Destination</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($trips as $t) :
        ?>
        <tr>
            <td><?php echo $t->getDestination(); ?></td>
            <td><?php echo $t->getDescription(); ?></td>
            <td><a href="index.php?action=showForm&area=trip&id=<?php echo $t->getId(); ?>">
                    <button class="btn btn-info">Edit</button>
                </a></td>
            <td><a href="index.php?action=delete&area=trip&id=<?php echo $t->getId(); ?>">
                    <button onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-info">Delete</button>
                </a></td>
        </tr>
    <?php endforeach; ?>
</table>
</main>
</div>
<?php include 'views/footer.php'; ?>




