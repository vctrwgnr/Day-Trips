<?php include 'views/header.php'; ?>
<div class="container-fluid">
<h3>Clients</h3>
<table class="table table-hover">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Country of Origin</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    <?php
    foreach ($clients as $c) :
        ?>
        <tr>
            <td><?php echo $c->getFirstName(); ?></td>
            <td><?php echo $c->getLastName(); ?></td>
            <td><?php echo $c->getGender(); ?></td>
            <td><?php echo $c->getDateOfBirth(); ?></td>
            <td><?php echo $c->getCountryOfOrigin(); ?></td>
            <td><?php echo $c->getEmail(); ?></td>
            <td><a href="index.php?action=showForm&area=client&id=<?php echo $c->getId(); ?>"><button class="btn btn-info">Edit</button></a></td>
            <td><a href="index.php?action=delete&area=client&id=<?php echo $c->getId(); ?>"><button class="btn btn-info" onclick="return confirm('Are you sure you want to delete this?');">Delete</button></a></td>

        </tr>
    <?php
    endforeach;
    ?>
</table>
</div>
<?php include 'views/footer.php'; ?>
